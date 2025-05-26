import React from 'react';

export default function LoginForm() {
    return (
        <div className="login-container">
            <h2>Giriş Yap</h2>
            <form method="POST" action="/login">
                <input type="email" name="email" placeholder="E-posta" required />
                <input type="password" name="password" placeholder="Şifre" required />
                <button type="submit">Giriş Yap</button>
            </form>
        </div>
    );
}
