@extends('layouts.app')

@section('content')
    <div
        style="border: 1px solid black; margin-top: 60px; width: 400px; margin-inline: auto; height: 400px; border-radius: 8px; display: flex; justify-content: center;">
        <div style="display: flex; flex-direction: column; align-items: center">

            <div style="height: fit-content; margin-top: 50px">
                <h1 style="font-size: 30px; font-weight: 700;">Login</h1>
            </div>

            <form action="/login" method="POST" style="display: flex; flex-direction: column; justify-content: center">
                <input type="hidden" id="role" name="role">
                <div style="display: flex; height: 30px; margin-top: 40px; margin-bottom: 20px; border-radius:10px; background-color: gray; justify-content: space-evenly" class="role">
                    <button type="button" onclick="pelanggan()" id="pelangganId" style="padding-inline: 10px; border-radius:10px">Pelanggan</button>
                    <button type="button" onclick="pemilik()" id="pemilikId" style="padding-inline: 10px; border-radius:10px">Pemilik Lapangan</button>
                </div>
                <h3>Email</h3>
                <input type="email" placeholder="Masukkan Email Anda" name="email" id="email"
                style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                <h3>Password</h3>
                <input type="password" placeholder="Masukkan Password Anda" name="password" id="password" style="border-bottom: 1px solid black; outline: none" required>

                <button style="background-color: green; width: 60px; display: inherit; margin-top: 15px; margin-inline: auto; padding:4px; display: inline-flex; justify-content: center; border-radius: 8px" type="submit">Masuk</button>
            </form>
        </div>
    </div>

    <script>
        let role = document.getElementById('role')
        role.value = 'pelanggan'
        let buttonPelanggan = document.getElementById('pelangganId')
        let buttonPemilik = document.getElementById('pemilikId')
        buttonPelanggan.style.backgroundColor = 'green'
        buttonPemilik.style.backgroundColor = 'gray'

        function pelanggan() {
            role.value = 'pelanggan'
            buttonPelanggan.style.backgroundColor = 'green'
            buttonPemilik.style.backgroundColor = 'gray'
        }

        function pemilik() {
            role.value = 'pemilik'
            buttonPelanggan.style.backgroundColor = 'gray'
            buttonPemilik.style.backgroundColor = 'green'
        }
    </script>
@endsection
