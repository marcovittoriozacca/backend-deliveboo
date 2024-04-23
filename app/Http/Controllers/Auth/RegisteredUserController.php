<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Type::all();

        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //Validazione della richiesta inviata tramite il form di registrazione (contiene i dati dell'utente e del ristorante)
        $request->validate([
            //dati utente
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
                                                                    ->mixedCase()
                                                                    ->letters()
                                                                    ->numbers()
                                                                    ->symbols()
            ],
            //dati ristorante
            'activity_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'piva' => ['required', 'string', 'size:11', 'unique:'.Restaurant::class],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,jpe,webp,heif,bmp,tiff,tif,xbm,png,svg', 'max:2000'],
        ],
        //messaggi alternativi che verranno visualizzati in caso di errore durante la fase di invio dei dati (se l'utente non supera la validazione dei dati)
        [
            //messaggi di errore personalizzati per il nome utente
            'name.required' => 'Inserisci il Nome',
            'name.string' => 'Inserisci un Nome valido',
            'name.max' => 'Il Nome inserito è troppo lungo',

            //messaggi di errore personalizzati per il cognome utente
            'surname.required' => 'Inserisci il Cognome',
            'surname.string' => 'Inserisci un Cognome valido',
            'surname.max' => 'Il Cognome inserito è troppo lungo',

            //messaggi di errore personalizzati per la email utente
            'email.required' => 'Inserisci una Email', 
            'email.string' => 'Inserisci una Email valida',
            'email.email' => 'Inserisci una Email valida',
            'email.max' => "L'email inserita è troppo lunga",
            'email.unique' => "Questa Email è già stata utilizzata in precedenza",

            //messaggi di errore personalizzati per la password utente
            'password.required' => 'Inserisci una Password',
            'password.min' => 'La Password deve essere composta da almeno 8 caratteri',
            'password.confirmed' => 'La password non corrisponde',
            'password.mixed' => 'La Password deve contenere almeno un carattere Maiuscolo e Minuscolo',
            'password.letters' => 'La Password deve contenere almeno una lettera',
            'password.numbers' => 'La Password deve contenere almeno un numero',
            'password.symbols' => 'La Password deve contenere almeno un carattere speciale',

            //messaggi di errore personalizzati per il nome del ristorante
            'activity_name.required' => 'Inserisci il Nome della tua Attività',
            'activity_name.string' => 'Inserisci un Nome valido per la tua Attività',
            'activity_name.max' => 'Il Nome della tua Attività è troppo lungo',

            //messaggi di errore personalizzati per l'indirizzo del ristorante
            'address.required' => "Inserisci un indirizzo per la tua Attività",
            'address.string' => 'Inserisci un Indirizzo valido',
            'address.max' => "L'indirizzo è troppo lungo",

            //messaggi di errore personalizzati per la partita iva del ristorante
            'piva.required' => 'Inserisci la Partita IVA',
            'piva.string' => 'Inserisci una Partita IVA valida',
            'piva.size' => 'La Partita IVA deve essere composta da 11 caratteri',
            'piva.unique' => 'Questa Partita IVA è già stata utilizzata in precedenza',

            //messaggi di errore personalizzati per la foto
            'image.image' => 'Puoi inserire soltato un file di tipo Immagine',
            'image.mime' => 'Estensione della immagine non ammessa.',
            'image.max' => "Peso dell'immagine troppo elevato.",
        ]);

        //Creazione del record UTENTE
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('restaurant_images', $request->image);
        }

        //Creazione del record RISTORANTE
        $new_restaurant = Restaurant::create([
            'activity_name' => $request->activity_name,
            'slug' => Str::slug($request->activity_name ,'-'),
            'address' => $request->address,
            'piva' => $request->piva,
            'image' => $path,
            'user_id' => $user->id,
        ]);

    
        //se al ristorante sono state associate delle categorie, viene compilata la tabella pivot con type_id e restaurant_id
        if($request->has('typologies')){
            $new_restaurant->types()->attach($request->typologies);
        }


        //avviente la registrazione
        event(new Registered($user));

        //l'utente viene loggato in automatico
        Auth::login($user);

        //redirection alla pagina /dashboard
        return redirect(RouteServiceProvider::HOME);
    }
}
