<h1>Đăng nhập</h1>
 <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="TenDangNhap" value="{{ old('email') }}" required autofocus>
        </div>
        <div>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="MatKhau" required>
        </div>
        <div>
            <button type="submit">Đăng nhập</button>
        </div>
         @error('username')
        <span style="color: red;">{{ $message }}</span>
    @enderror
</form>