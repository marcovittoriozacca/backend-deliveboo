<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'activity_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'piva' => ['required', 'string', 'size:11', 'unique:'.Restaurant::class],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,bmp,png,svg'],
        ],
        //messaggi alternativi che verranno visualizzati in caso di errore durante la fase di invio dei dati (se l'utente non supera la validazione dei dati)
        [
            'name.required' => 'Inserisci il Nome',
            'name.string' => 'Inserisci un Nome valido',
            'name.max' => 'Il Nome inserito è troppo lungo',

            'surname.required' => 'Inserisci il Cognome',
            'surname.string' => 'Inserisci un Cognome valido',
            'surname.max' => 'Il Cognome inserito è troppo lungo',

            'email.required' => 'Inserisci una Email', 
            'email.string' => 'Inserisci una Email valida',
            'email.email' => 'Inserisci una Email valida',
            'email.max' => "L'email inserita è troppo lunga",
            'email.unique' => "Questa Email è già stata utilizzata in precedenza",

            //da completare la validazione della password
            'password.required' => 'Inserisci una password',
            'password.confirmed' => '',

            'activity_name.required' => 'Inserisci il Nome della tua Attività',
            'activity_name.string' => 'Inserisci un Nome valido per la tua Attività',
            'activity_name.max' => 'Il Nome della tua Attività è troppo lungo',

            'address.required' => "Inserisci un indirizzo per la tua Attività",
            'address.string' => 'Inserisci un Indirizzo valido',
            'address.max' => "L'indirizzo è troppo lungo",

            'piva.required' => 'Inserisci la Partita IVA',
            'piva.string' => 'Inserisci una Partita IVA valida',
            'piva.size' => 'La Partita IVA deve essere composta da 11 caratteri',
            'piva.unique' => 'Questa Partita IVA è già stata utilizzata in precedenza',

            'image.image' => 'Puoi inserire soltato un file di tipo Immagine',
            'image.mime' => 'Tipo di file non ammesso. Usa: jpg, jpeg, bmp, png o svg',
            // 'image' => ['nullable', 'image', 'mimes:jpg,jpeg,bmp,png,svg'],
        ]);


        //Creazione del record UTENTE
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Creazione del record RISTORANTE
        Restaurant::create([
            'activity_name' => $request->activity_name,
            'slug' => Str::slug($request->activity_name ,'-'),
            'address' => $request->address,
            'piva' => $request->piva,
            'image' => null,
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
