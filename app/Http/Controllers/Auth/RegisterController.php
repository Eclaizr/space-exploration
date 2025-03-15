<?php
// filepath: c:\Users\clair\Desktop\space-exploration\app\Http\Controllers\Auth\RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');  // Assurez-vous que cette vue existe
    }

    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:logins|alpha_dash|min:4|max:255',  // Utiliser 'username' à la place de 'login'
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,gestionnaire,astronaute,chercheur',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Créer un utilisateur dans la table 'logins'
        $login = new Login();
        $login->username = $request->username;
        $login->password = Hash::make($request->password);  // Hash
        $login->role = $request->role;
        $login->save();

        // Rediriger vers la page de connexion avec un message de succès
        return redirect()->route('login')->with('success', 'Utilisateur créé, vous pouvez maintenant vous connecter.');
    }
}