@extends('frontend.template')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="register-req">
                <h4>SELAMAT DATANG di {{ config('app.name') }}</h4>
                <p><b>Syarat & ketentuan</b> yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh kami terkait penggunaan situs {{ config('app.name') }}.</p>
                <p>Pengguna disarankan membaca dengan seksama karena dapat berdampak kepada hak dan kewajiban Pengguna di bawah hukum.</p>
                <p>Dengan mendaftar dan/atau menggunakan situs kami, maka pengguna dianggap telah membaca, mengerti, memahami dan menyutujui semua isi dalam Syarat & ketentuan.</p>
                <p>Syarat & ketentuan ini merupakan bentuk kesepakatan yang dituangkan dalam sebuah perjanjian yang sah antara Pengguna dengan kami.</p>
                <p>Jika pengguna tidak menyetujui salah satu, sebagian, atau seluruh isi Syarat & ketentuan, maka pengguna tidak diperkenankan menggunakan layanan kami.</p>
            </div><!--/register-req-->

            <div class="register-req">
                <h6>TRANSAKSI PEMBELIAN</h6>
                <p>1. Pembeli wajib bertransaksi melalui prosedur transaksi yang telah ditetapkan oleh kami. Pembeli melakukan pembayaran dengan menggunakan metode pembayaran yang sebelumnya telah dipilih oleh Pembeli.</p>
                <p>2. Pembeli memahami dan menyetujui bahwa masalah keterlambatan proses pembayaran dan biaya tambahan yang disebabkan oleh perbedaan bank yang Pembeli pergunakan dengan bank Rekening {{ config('app.name') }} adalah tanggung jawab Pembeli secara pribadi.</p>
            </div>

            <div class="register-req">
                <h6>KETENTUAN LAIN</h6>
                <p>1. Apabila Pengguna mempergunakan fitur-fitur yang tersedia dalam situs Tokopedia  maka Pengguna dengan ini menyatakan memahami dan menyetujui segala syarat dan ketentuan yang diatur.</p>
                <p>2. Segala hal yang belum dan/atau tidak diatur dalam syarat dan ketentuan khusus dalam fitur tersebut maka akan sepenuhnya merujuk pada syarat dan ketentuan {{ config('app.name') }} secara umum</p>
            </div>
        </div>
    </section>
@endsection
