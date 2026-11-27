@extends('layouts.app')

@section('content')
    <div
        style="border: 1px solid black; margin-top: 60px; width: 800px; margin-inline: auto; height: 500px; border-radius: 8px; display: flex; justify-content: center;" id="container_register">
        <div style="display: flex; flex-direction: column; align-items: center">

            <div style="height: fit-content; margin-top: 50px">
                <h1 style="font-size: 30px; font-weight: 700;">Register</h1>
            </div>

            <form action="/login" method="POST" style="display: flex; flex-direction: column; justify-content: center">
                <input type="hidden" id="role" name="role">
                <div style="display: flex; width: fit-content; height: 30px; margin-top: 40px; margin-bottom: 20px; border-radius:10px; background-color: gray; justify-content: space-evenly; margin-inline: auto"
                    class="role">
                    <button type="button" onclick="pelanggan()" id="pelangganId"
                        style="padding-inline: 10px; border-radius:10px">Pelanggan</button>
                    <button type="button" onclick="pemilik()" id="pemilikId"
                        style="padding-inline: 10px; border-radius:10px">Pemilik Lapangan</button>
                </div>

                <div style="width: 600px; display: flex; justify-content: space-between; column-gap: 10px"
                    id="container_input">
                </div>

                <button
                    style="background-color: green; width: 60px; display: inherit; margin-top: 15px; margin-inline: auto; padding:4px; display: inline-flex; justify-content: center; border-radius: 8px"
                    type="submit">Masuk</button>
            </form>
        </div>
    </div>

    <script>
        let role = document.getElementById('role')
        role.value = 'pelanggan'
        let buttonPelanggan = document.getElementById('pelangganId')
        let buttonPemilik = document.getElementById('pemilikId')
        let containerInput = document.getElementById('container_input')
        let containerRegister = document.getElementById('container_register')
        containerRegister.style.width = '600px'
        containerInput.style.width = '400px'
        containerInput.innerHTML = `
                    <div>
                        <h3>Nama Depan</h3>
                        <input type="text" placeholder="Nama depan Anda" name="namaDepan" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Nama Belakang</h3>
                        <input type="text" placeholder="Nama Belakang Anda" name="namaBelakang" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Jenis Kelamin</h3>
                        <select name="jenisKelamin" id="kelamin" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                            <option value="1">Laki-Laki</option>
                            <option value="0">Perempuan</option>
                            </select>
                            </div>
                            <div>
                                <h3>Nomer Telepon</h3>
                                <input type="text" placeholder="Nomer Telepon Anda" name="nomerTelepon" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                                <h3>Email</h3>
                                <input type="email" placeholder="Masukkan Email" name="email" id="email"
                                style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                                <h3>Password</h3>
                                <input type="password" placeholder="Masukkan Password" name="password" id="password"
                                style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                                </div>`

                                buttonPelanggan.style.backgroundColor = 'green'
                                buttonPemilik.style.backgroundColor = 'gray'

                                function pelanggan() {
                                    role.value = 'pelanggan'
                                    buttonPelanggan.style.backgroundColor = 'green'
            buttonPemilik.style.backgroundColor = 'gray'

            containerInput.style.width = '400px'
            containerInput.innerHTML = `
            <div>
                <h3>Nama Depan</h3>
                <input type="text" placeholder="Nama depan Anda" name="namaDepan" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                <h3>Nama Belakang</h3>
                <input type="text" placeholder="Nama Belakang Anda" name="namaBelakang" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                <h3>Jenis Kelamin</h3>
                <select name="jenisKelamin" id="kelamin" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                    <option value="1">Laki-Laki</option>
                    <option value="0">Perempuan</option>
                    </select>
                    </div>
                    <div>
                        <h3>Nomer Telepon</h3>
                        <input type="text" placeholder="Nomer Telepon Anda" name="nomerTelepon" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Email</h3>
                        <input type="email" placeholder="Masukkan Email" name="email" id="email"
                        style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Password</h3>
                        <input type="password" placeholder="Masukkan Password" name="password" id="password"
                        style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        </div>`
                    }

                    function pemilik() {
                        role.value = 'pemilik'
                        buttonPelanggan.style.backgroundColor = 'gray'
                        buttonPemilik.style.backgroundColor = 'green'
                        containerRegister.style.width = '800px'
                        containerInput.style.width = '600px'
                        containerInput.innerHTML = `
                        <div>
                            <h3>Nama Depan</h3>
                            <input type="text" placeholder="Nama depan Anda" name="namaDepan" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                            <h3>Nama Belakang</h3>
                            <input type="text" placeholder="Nama Belakang Anda" name="namaBelakang" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                            <h3>Jenis Kelamin</h3>
                            <select name="jenisKelamin" id="kelamin" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                            <option value="1">Laki-Laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <h3>Nomer Telepon</h3>
                        <input type="text" placeholder="Nomer Telepon Anda" name="nomerTelepon" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Email</h3>
                        <input type="email" placeholder="Masukkan Email" name="email" id="email"
                        style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                        <h3>Password</h3>
                        <input type="password" placeholder="Masukkan Password" name="password" id="password"
                        style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px" required>
                    </div>
                    <div>
                        <h3>No KTP</h3>
                        <input type="text" placeholder="no ktp" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px">
                        <h3>foto KTP</h3>
                        <input type="file" style="border-bottom: 1px solid black; outline: none; margin-bottom: 20px; width: 190px">
                    </div>`
        }
    </script>
@endsection
