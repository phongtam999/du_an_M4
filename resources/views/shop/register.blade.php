<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    section {
        position: relative;
        width: 100%;
        height: 100vh;
        display: flex;
    }

    section .img-bg {
        position: relative;
        width: 50%;
        height: 100%;
    }



    section .img-bg img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    section .noi-dung {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 100%;
    }

    section .noi-dung .form {
        width: 50%;
    }


    section .noi-dung .form h2 {
        color: #607d8b;
        font-weight: 500;
        font-size: 1.5em;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 4px solid #6694e9;
        display: inline-block;
        letter-spacing: 1px;
    }

    section .noi-dung .form .input-form {
        margin-bottom: 20px;
    }

    section .noi-dung .form .input-form span {
        font-size: 16px;
        margin-bottom: 5px;
        display: inline-block;
        color: #607db8;
        letter-spacing: 1px;
    }

    section .noi-dung .form .input-form input {
        width: 100%;
        padding: 10px 20px;
        outline: none;
        border: 1px solid #607d8b;
        font-size: 16px;
        letter-spacing: 1px;
        color: #607d8b;
        background: wheat;
        border-radius: 30px;
    }

    section .noi-dung .form .input-form input[type="submit"] {
        background: red;
        color: #fff;
        outline: none;
        border: none;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
            0 2px 2px rgba(0, 0, 0, 0.12),
            0 4px 4px rgba(0, 0, 0, 0.12),
            0 8px 8px rgba(0, 0, 0, 0.12),
            0 16px 16px rgba(0, 0, 0, 0.12);
    }

    section .noi-dung .form .input-form input[type="submit"]:hover {
        background: #6694e9;
    }

    section .noi-dung .form .nho-dang-nhap {
        margin-bottom: 10px;
        color: #607d8b;
        font-size: 14px;
    }

    section .noi-dung .form .input-form p {
        color: #607d8b;
    }

    section .noi-dung .form .input-form p a {
        color: #ffb3b3;
    }

    section .noi-dung .form h3 {
        color: #607d8b;
        text-align: center;
        margin: 80px 0 10px;
        font-weight: 500;
    }

    section .noi-dung .form .icon-dang-nhap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section .noi-dung .form .icon-dang-nhap li {
        list-style: none;
        cursor: pointer;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(1) {
        color: #3b5999;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(2) {
        color: #dd4b39;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(3) {
        color: #55acee;
    }

    section .noi-dung .form .icon-dang-nhap li i {
        font-size: 24px;
    }

    @media (max-width: 768px) {
        section .img-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        section .noi-dung {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        section .noi-dung .form {
            width: 100%;
            padding: 40px;
            background: rgba(255 255 255 / 0.9);
            margin: 50px;
        }

        section .noi-dung .form h3 {
            color: #607d8b;
            text-align: center;
            margin: 30px 0 10px;
            font-weight: 500;
        }
    }
</style>
<section>
    <!--Bắt Đầu Phần Hình Ảnh-->
    <div class="img-bg">
        <img src="https://vnn-imgs-f.vgcloud.vn/2021/12/05/17/nhan-sac-doi-thuong-cua-tan-hoa-hau-hoa-binh-quoc-te-2021-thuy-tien-1.jpeg">
    </div>

    <!--Kết Thúc Phần Hình Ảnh-->
    <!--Bắt Đầu Phần Nội Dung-->
    <div class="noi-dung">
        <style>
            .noi-dung {
                background-color: white;
            }
        </style>
        <div class="form">
            <h2 style="color:red">Trang Đăng Ký</h2>
            <form action="{{ route('shop.checkregister') }}" method="POST">
                @csrf
                <div class="input-form">
                    <span style="color:blue">Tên:</span>
                    <input type="text" name="name">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="input-form">
                    <span style="color:blue">Email:</span>
                    <input type="text" name="email">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email')}}</p>
                    @endif
                </div>
                <div class="input-form">
                    <span style="color:blue">Mật khẩu:</span>
                    <input type="password" name="password">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="input-form">
                    <span style="color:blue">Nhập lại khẩu:</span>
                    <input type="password" name="confirmpassword">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('confirmpassword') }}</p>
                    @endif
                </div>

                <div class="input-form">
                    <span style="color:blue">Địa chỉ:</span>
                    <input type="name" name="address">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="input-form">
                    <span style="color:blue">Số điện thoại:</span>
                    <input type="name" name="phone">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="input-form">
                    <input type="submit" value="Đăng Ký">
                </div>
            </form>
        </div>
    </div>
    <!--Kết Thúc Phần Nội Dung-->
</section>