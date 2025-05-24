import { useState } from "react";
import Input from "../components/Input";
import toast from "react-hot-toast";

function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const handleLogin = (e) => {
    e.preventDefault();

    if (!email.includes("@")) {
      toast.error("Lütfen geçerli bir e-posta adresi girin.");
      return;
    }

    if (password.length < 6) {
      toast.error("Şifre en az 6 karakter olmalı.");
      return;
    }


    toast.error("E-posta veya şifre hatalı.");
    toast.success("Giriş başarılı! 🎉");

  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-100 via-white to-red-100 px-4">
      <div className="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-orange-200">
        <h2 className="text-3xl font-bold text-center mb-6 text-orange-700">Giriş Yap</h2>

        <form onSubmit={handleLogin} className="space-y-4">
          <Input
            label="E-posta"
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
          />
          <Input
            label="Şifre"
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
          <button
            type="submit"
            className="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg transition duration-200"
          >
            Giriş Yap
          </button>
        </form>
      </div>
    </div>
  );
}

export default Login;
