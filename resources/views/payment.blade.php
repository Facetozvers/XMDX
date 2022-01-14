@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">Pilih Metode Pembayaran</div>
                    <div class="card-body">
                        <div class="row">
                            <label for="">Card Payment</label>
                            <div class="col-12">
                                <button class="btn btn-light border w-100 text-left" data-toggle="modal" data-target="#CardDetails"><i class="fab fa-cc-visa me-2" style="color:#09207d"></i><i class="fab fa-cc-mastercard me-2" style="color:#eb001b"></i>Credit Card / Debit Card</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <label for="">Virtual Account</label>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" data-toggle="modal" data-target="#mandiriVA"><strong><i class="fas fa-money-check me-2" style="color:#0c386a"></i>Mandiri Virtual Account</strong></button>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" data-toggle="modal" data-target="#bniVA"><strong><i class="fas fa-money-check me-2" style="color:#d55e1e"></i>BNI Virtual Account</strong></button>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" data-toggle="modal" data-target="#bcaVA"><strong><i class="fas fa-money-check me-2" style="color:#005aa6"></i>BCA Virtual Account</strong></button>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" data-toggle="modal" data-target="#permataVA"><strong><i class="fas fa-money-check me-2" style="background: rgb(0,122,195); background: linear-gradient(90deg, rgba(0,122,195,1) 0%, rgba(176,40,47,1) 44%, rgba(157,58,44,1) 58%, rgba(14,191,23,1) 95%, rgba(14,191,23,1) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>Permata Virtual Account</strong></button>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" data-toggle="modal" data-target="#briVA"><strong><i class="fas fa-money-check me-2" style="color:#e66819"></i>BRIVA</strong></button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <label for="">e-Wallet</label>
                            <div class="col mb-2">
                                <button class="btn btn-light w-100 text-left" style="color:white; background:#01a5cb" data-toggle="modal" data-target="#gopay"><strong>Gopay</strong></button>
                            </div>
                            <div class="col mb-2">
                                <button class="btn btn-light w-100 text-left" style="color:white; background:#49308c" data-toggle="modal" data-target="#ovo"><strong>OVO</strong></button>
                            </div>
                            <div class="col mb-2">
                                <button class="btn btn-light w-100 text-left" style="color:white; background:#0f87dd" data-toggle="modal" data-target="#dana"><strong>DANA</strong></button>
                            </div>
                            <div class="col mb-2">
                                <button class="btn btn-light w-100 text-left" style="color:white; background:#e4492a" data-toggle="modal" data-target="#shopeePay"><strong>Shopee Pay</strong></button>
                            </div>
                            <div class="col mb-2">
                                <button class="btn btn-light w-100 text-left" style="color:white; background:#ef0000" data-toggle="modal" data-target="#linkAja"><strong>LinkAja</strong></button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <label for="">Retail</label>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" style="color:#df192b" data-toggle="modal" data-target="#alfamart"><strong>Alfamart</strong></button>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-light w-100 text-left border" style="color:#0000f2" data-toggle="modal" data-target="#indomaret"><strong>Indomaret</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="CardDetails" tabindex="-1" role="dialog" aria-labelledby="CardDetails" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Card Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="card_validation_status" class="mb-2 alert d-none"></div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="card_number">Card Number</label>
                            <input class="form-control" type="number" id="card_number" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="card_month">Expiration</label>
                            <div class="input-group">
                                <input type="text" aria-label="Month" class="form-control" id="card_exp_month" placeholder="MM" maxlength="2">
                                <input type="text" aria-label="Year" class="form-control" id="card_exp_year" placeholder="YYYY" maxlength="4">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="card_cvv">CVV</label>
                            <input class="form-control" type="number" id="card_cvv" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="font-size:40px"><i class="fab fa-cc-visa me-2" style="color:#09207d"></i><i class="fab fa-cc-mastercard me-2" style="color:#eb001b"></i></p>
                        </div>
                        
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <form action="/midtrans/chargeCard" method="post" id="tokenForm">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="first_name">Nama Depan</label>
                            <input class="form-control" id="first_name" type="text" name="first_name" required>
                        </div>
                        <div class="col-6">
                            <label for="last_name">Nama Belakang</label>
                            <input class="form-control" type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="address">Alamat</label>
                            <input class="form-control" type="text" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="city">Kota</label>
                            <input class="form-control" type="text" id="city" name="city" required>
                        </div>
                        <div class="col-6">
                            <label for="postal_code">Kode Pos</label>
                            <input class="form-control" type="number" id="postal_code" name="postal_code" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="country_code">Negara</label>
                            <select class="form-select" name="country_code" id="country_code" required>
                                <option value="IDN">Indonesia</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="card_token" id="card_token">
                    <button type="submit" class="d-none" id="cardSubmitButton"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="getToken()">Bayar</button>
                </div>
                
                
            </div>
        </div>
    </div>

    <!-- Mandiri Modal -->
    <div class="modal fade" id="mandiriVA" tabindex="-1" role="dialog" aria-labelledby="mandiriVA" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#0c386a">
                    <h5 class="modal-title text-center" style="color:white">Mandiri Virtual Account</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ul class="nav nav-tabs" id="mandiriTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="atm-mandiri" data-bs-toggle="tab" data-bs-target="#atm_mandiri" type="button" role="tab" aria-controls="atm_mandiri" aria-selected="true">ATM Mandiri</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ib-mandiri" data-bs-toggle="tab" data-bs-target="#ib_mandiri" type="button" role="tab" aria-controls="ib_mandiri" aria-selected="false">Mandiri Internet Banking</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="atm_mandiri" role="tabpanel" aria-labelledby="atm-mandiri">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pada menu utama, pilih Bayar/Beli.</li>
                                        <li>Pilih Lainnya.</li>
                                        <li>Pilih Multi Payment.</li>
                                        <li>Masukkan 70012 (kode perusahaan Midtrans) lalu tekan Benar.</li>
                                        <li>Masukkan Kode Pembayaran Anda lalu tekan Benar.</li>
                                        <li>Pada halaman konfirmasi akan muncul detail pembayaran Anda. Jika informasi telah sesuai tekan Ya.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ib_mandiri" role="tabpanel" aria-labelledby="ib-mandiri">
                        <div class="row mt-3">
                            <div class="col">
                                    <ol>
                                        <li>Login ke Internet Banking Mandiri (https://ibank.bankmandiri.co.id/).</li>
                                        <li>Pada menu utama, pilih Bayar, lalu pilih Multi Payment.</li>
                                        <li>Pilih akun Anda di Dari Rekening, kemudian di Penyedia Jasa pilih Midtrans.</li>
                                        <li>Masukkan Kode Pembayaran Anda dan klik Lanjutkan.</li>
                                        <li>Konfirmasi pembayaran Anda menggunakan Mandiri Token.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/midtrans/chargeMandiriVA">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BCA MODAL -->
    <div class="modal fade" id="bcaVA" tabindex="-1" role="dialog" aria-labelledby="bcaVA" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#005aa6">
                    <h5 class="modal-title text-center" style="color:white">BCA Virtual Account</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ul class="nav nav-tabs" id="bcaTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="atm-bca" data-bs-toggle="tab" data-bs-target="#atm_bca" type="button" role="tab" aria-controls="atm_bca" aria-selected="true">ATM BCA</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="klik-bca" data-bs-toggle="tab" data-bs-target="#klik_bca" type="button" role="tab" aria-controls="klik_bca" aria-selected="false">Klik BCA</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="m-bca" data-bs-toggle="tab" data-bs-target="#m_bca" type="button" role="tab" aria-controls="m_bca" aria-selected="false">m-BCA</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="bcaContent">
                        <div class="tab-pane fade show active" id="atm_bca" role="tabpanel" aria-labelledby="atm-bca">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pada menu utama, pilih Transaksi Lainnya.</li>
                                        <li>Pilih Transfer.</li>
                                        <li>Pilih Ke Rek BCA Virtual Account.</li>
                                        <li>Masukkan Nomor Rekening pembayaran (11 digit) Anda lalu tekan Benar.</li>
                                        <li>Masukkan jumlah tagihan yang akan anda bayar.</li>
                                        <li>Pada halaman konfirmasi transfer akan muncul detail pembayaran Anda. Jika informasi telah sesuai tekan Ya.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="klik_bca" role="tabpanel" aria-labelledby="klik-bca">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pilih menu Transfer Dana.</li>
                                        <li>Pilih Transfer ke BCA Virtual Account.</li>
                                        <li>Masukkan nomor BCA Virtual Account, atau pilih Dari Daftar Transfer.</li>
                                        <li>Ambil BCA Token Anda dan masukkan KEYBCA Response APPLI 1 dan Klik Submit.</li>
                                        <li>Transaksi Anda selesai.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="m_bca" role="tabpanel" aria-labelledby="m-bca">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Lakukan log in pada aplikasi BCA Mobile.</li>
                                        <li>Pilih menu m-BCA, kemudian masukkan kode akses m-BCA.</li>
                                        <li>Pilih m-Transfer > BCA Virtual Account.</li>
                                        <li>Pilih dari Daftar Transfer, atau masukkan Nomor Virtual Account tujuan.</li>
                                        <li>Masukkan jumlah yang ingin dibayarkan.</li>
                                        <li>Masukkan pin m-BCA.</li>
                                        <li>Pembayaran selesai. Simpan notifikasi yang muncul sebagai bukti pembayaran.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/midtrans/chargeBCAVA">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BNI MODAL -->
    <div class="modal fade" id="bniVA" tabindex="-1" role="dialog" aria-labelledby="bniVA" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#d55e1e">
                    <h5 class="modal-title text-center" style="color:white">BNI Virtual Account</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ul class="nav nav-tabs" id="bniTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="atm-bni" data-bs-toggle="tab" data-bs-target="#atm_bni" type="button" role="tab" aria-controls="atm_bni" aria-selected="true">ATM BNI</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ib-bni" data-bs-toggle="tab" data-bs-target="#ib_bni" type="button" role="tab" aria-controls="ib_bni" aria-selected="false">BNI Internet Banking</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="m-bni" data-bs-toggle="tab" data-bs-target="#m_bni" type="button" role="tab" aria-controls="m_bni" aria-selected="false">BNI Mobile Banking</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="bniContent">
                        <div class="tab-pane fade show active" id="atm_bni" role="tabpanel" aria-labelledby="atm-bni">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pada menu utama, pilih Menu Lainnya.</li>
                                        <li>Pilih Transfer.</li>
                                        <li>Pilih Rekening Tabungan.</li>
                                        <li>Pilih Ke Rekening BNI.</li>
                                        <li>Masukkan nomor virtual account dan pilih Tekan Jika Benar.</li>
                                        <li>Masukkan jumlah tagihan yang akan anda bayar secara lengkap. Pembayaran dengan jumlah tidak sesuai akan otomatis ditolak.</li>
                                        <li>Jumlah yang dibayarkan, nomor rekening dan nama Merchant akan ditampilkan. Jika informasi telah sesuai, tekan Ya.</li>
                                        <li>Transaksi Anda sudah selesai.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ib_bni" role="tabpanel" aria-labelledby="ib-bni">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Ketik alamat https://ibank.bni.co.id kemudian klik Masuk.</li>
                                        <li>Silakan masukkan User ID dan Password.</li>
                                        <li>Klik menu Transfer kemudian pilih Tambah Rekening Favorit.</li>
                                        <li>Masukkan nama, nomor rekening, dan email, lalu klik Lanjut.</li>
                                        <li>Masukkan Kode Otentikasi dari token Anda dan klik Lanjut.</li>
                                        <li>Kembali ke menu utama dan pilih Transfer lalu Transfer Antar Rekening BNI.</li>
                                        <li>Pilih rekening yang telah Anda favoritkan sebelumnya di Rekening Tujuan lalu lanjutkan pengisian, dan tekan Lanjut.</li>
                                        <li>Pastikan detail transaksi Anda benar, lalu masukkan Kode Otentikasi dan tekan Lanjut.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="m_bni" role="tabpanel" aria-labelledby="m-bni">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Buka aplikasi BNI Mobile Banking dan login</li>
                                        <li>Pilih menu Transfer</li>
                                        <li>Pilih menu Virtual Account Billing</li>
                                        <li>Pilih rekening debit yang akan digunakan</li>
                                        <li>Pilih menu Input Baru dan masukkan 16 digit nomor Virtual Account</li>
                                        <li>Informasi tagihan akan muncul pada halaman validasi</li>
                                        <li>Jika informasi telah sesuai, masukkan Password Transaksi dan klik Lanjut</li>
                                        <li>Transaksi Anda akan diproses</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn border" style="background:#d55e1e; color:white" href="/midtrans/chargeBNIVA">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Permata MODAL -->
    <div class="modal fade" id="permataVA" tabindex="-1" role="dialog" aria-labelledby="permataVA" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: rgb(0,122,195); background: linear-gradient(90deg, rgba(0,122,195,1) 0%, rgba(176,40,47,1) 44%, rgba(157,58,44,1) 58%, rgba(14,191,23,1) 95%, rgba(14,191,23,1) 100%);">
                    <h5 class="modal-title text-center" style="color:white">Permata Virtual Account</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ul class="nav nav-tabs" id="permataTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="atm-permata" data-bs-toggle="tab" data-bs-target="#atm_permata" type="button" role="tab" aria-controls="atm_permata" aria-selected="true">ATM BCA</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="permataContent">
                        <div class="tab-pane fade show active" id="atm_permata" role="tabpanel" aria-labelledby="atm-permata">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pada menu utama, pilih Transaksi Lainnya.</li>
                                        <li>Pilih Pembayaran.</li>
                                        <li>Pilih Pembayaran Lainnya.</li>
                                        <li>Pilih Virtual Account.</li>
                                        <li>Masukkan 16 digit No. Virtual Account yang dituju, lalu tekan Benar.</li>
                                        <li>Pilih rekening pembayaran Anda dan tekan Benar.</li>
                                        <li>Transaksi Anda sudah selesai.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/midtrans/chargePermataVA">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BRIVA MODAL -->
    <div class="modal fade" id="briVA" tabindex="-1" role="dialog" aria-labelledby="briVA" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#065096">
                    <h5 class="modal-title text-center" style="color:white">BRIVA</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ul class="nav nav-tabs" id="briTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="atm-bri" data-bs-toggle="tab" data-bs-target="#atm_bri" type="button" role="tab" aria-controls="atm_bri" aria-selected="true">ATM BRI</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ib-bri" data-bs-toggle="tab" data-bs-target="#ib_bri" type="button" role="tab" aria-controls="ib_bri" aria-selected="false">IB BRI</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="m-bri" data-bs-toggle="tab" data-bs-target="#m_bri" type="button" role="tab" aria-controls="m_bri" aria-selected="false">BRImo</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="briContent">
                        <div class="tab-pane fade show active" id="atm_bri" role="tabpanel" aria-labelledby="atm-bri">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Pilih menu utama, pilih Transaksi Lain.</li>
                                        <li>Pilih Pembayaran.</li>
                                        <li>Pilih Lainnya.</li>
                                        <li>Pilih BRIVA.</li>
                                        <li>Masukkan Nomor BRIVA pelanggan dan pilih Benar.</li>
                                        <li>Jumlah pembayaran, nomor BRIVA dan nama merchant akan muncul pada halaman konfirmasi pembayaran. Jika informasi yang dicantumkan benar, pilih Ya.</li>
                                        <li>Pembayaran telah selesai. Simpan bukti pembayaran Anda.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ib_bri" role="tabpanel" aria-labelledby="ib-bri">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Masuk pada Internet Banking BRI.</li>
                                        <li>Pilih menu Pembayaran & Pembelian.</li>
                                        <li>Pilih sub menu BRIVA.</li>
                                        <li>Masukkan Nomor BRIVA.</li>
                                        <li>Jumlah pembayaran, nomor pembayaran, dan nama merchant akan muncul pada halaman konfirmasi pembayaran. Jika informasi yang dicantumkan benar, pilih Kirim.</li>
                                        <li>Masukkan password dan mToken, pilih Kirim.</li>
                                        <li>Masukkan password dan mToken, pilih Kirim.</li>
                                        <li>Pembayaran telah selesai. Untuk mencetak bukti transaksi, pilih Cetak.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="m_bri" role="tabpanel" aria-labelledby="m-bri">
                            <div class="row mt-3">
                                <div class="col">
                                    <ol>
                                        <li>Masuk ke dalam aplikasi BRI Mobile, pilih Mobile Banking BRI.</li>
                                        <li>Pilih Pembayaran, lalu pilih BRIVA.</li>
                                        <li>Masukkan nomor BRIVA.</li>
                                        <li>Jumlah pembayaran, nomor pembayaran, dan nama merchant akan muncul pada halaman konfirmasi pembayaran. Jika informasi yang dicantumkan benar, pilih Continue.</li>
                                        <li>Masukkan Mobile Banking BRI PIN, pilih Ok.</li>
                                        <li>Pembayaran telah selesai. Simpan notifikasi sebagai bukti pembayaran.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn border" style="background:#d55e1e; color:white" href="/midtrans/chargeBRIVA">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gopay MODAL -->
    <div class="modal fade" id="gopay" tabindex="-1" role="dialog" aria-labelledby="gopay" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#01a5cb">
                    <h5 class="modal-title text-center"><strong>Gopay</strong></h5>
                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Buka aplikasi Gojek</li>
                        <li>Klik menu 'Bayar'</li>
                        <li>Pindai kode QR yang ada pada monitor Anda.</li>
                        <li>Periksa detail transaksi Anda pada aplikasi, lalu tap tombol Bayar.</li>
                        <li>Masukkan PIN dan selesaikan transaksi kamu.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/midtrans/chargeGopay">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- OVO MODAL -->
    <div class="modal fade" id="ovo" tabindex="-1" role="dialog" aria-labelledby="ovo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#49308c">
                    <h5 class="modal-title text-center"><strong>OVO</strong></h5>
                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form action="/xendit/chargeOVO" method="post" id="ovoForm">
                        @csrf
                        <label for="">Masukkan Nomor Handphone</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="number" name="mobile_number" class="form-control" placeholder="81233626563" required>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Masukkan Nomor Handphone</li>
                        <li>Klik tombol Bayar</li>
                        <li>Pembayaran diproses</li>
                        <li>Anda akan menerima notifikasi pada aplikasi OVO</li>
                        <li>Anda dapat memeriksa detail pembayaran</li>
                        <li>Klik Bayar</li>
                        <li>Transaksi Berhasil</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" form="ovoForm" class="btn btn-primary">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dana MODAL -->
    <div class="modal fade" id="dana" tabindex="-1" role="dialog" aria-labelledby="dana" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#0f87dd">
                    <h5 class="modal-title text-center"><strong>DANA</strong></h5>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Anda akan diarahkan ke halaman pembayaran DANA</li>
                        <li>Input Nomor Handphone</li>
                        <li>Masukkan PIN DANA</li>
                        <li>Untuk transaksi pertama, anda akan menerima kode OTP yang harus diinputkan</li>
                        <li>Anda dapat memeriksa detail pembayaran</li>
                        <li>Klik Bayar</li>
                        <li>Transaksi Selesai</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/xendit/chargeDana">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ShopeePay MODAL -->
    <div class="modal fade" id="shopeePay" tabindex="-1" role="dialog" aria-labelledby="shopeePay" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#e4492a">
                    <h5 class="modal-title text-center"><strong>Shopee Pay</strong></h5>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Anda akan diarahkan ke Aplikasi ShopeePay</li>
                        <li>ShopeePay akan menampilkan total pembayaran</li>
                        <li>Masukkan PIN</li>
                        <li>Klik Lanjutkan</li>
                        <li>Transaksi Selesai</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/xendit/chargeShopeePay">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- LinkAja MODAL -->
    <div class="modal fade" id="linkAja" tabindex="-1" role="dialog" aria-labelledby="linkAja" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#ef0000">
                    <h5 class="modal-title text-center"><strong>Link Aja</strong></h5>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Anda akan dialihkan ke halaman pembayaran LinkAja</li>
                        <li>Masukkan PIN</li>
                        <li>Anda akan menerima SMS kode OTP</li>
                        <li>Masukkan Kode OTP</li>
                        <li>Transaksi Selesai</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/xendit/chargeLinkAja">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- alfamart MODAL -->
    <div class="modal fade" id="alfamart" tabindex="-1" role="dialog" aria-labelledby="alfamart" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#df192b">
                    <h5 class="modal-title text-center"><strong>Alfamart</strong></h5>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Kunjungi gerai Alfamart/Alfamidi/Lawson/DAN+DAN terdekat sebelum kode pembayaran kedaluwarsa</li>
                        <li>Informasikan ke Kasir untuk melakukan pembayaran ke TestingAja</li>
                        <li>Berikan informasi KODE PEMBAYARAN yang tertera di Aplikasi atau Website kepada kasir</li>
                        <li>Pastikan jumlah pembayaran di tempat anda berbelanja sama dengan jumlah yang diberitahukan oleh kasir, lalu konfirmasi pembayaran</li>
                        <li>Simpan bukti pembayaran dari Alfamart</li>
                        <li>Pembayaran Alfamart anda sudah selesai</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/xendit/chargeAlfamart">Bayar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- indomaret MODAL -->
    <div class="modal fade" id="indomaret" tabindex="-1" role="dialog" aria-labelledby="indomaret" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:white; background:#0000f2">
                    <h5 class="modal-title text-center"><strong>Indomaret</strong></h5>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cara Pembayaran</p>
                    <ol>
                        <li>Kunjungi gerai Indomaret terdekat sebelum kode pembayaran kedaluwarsa</li>
                        <li>Informasikan ke Kasir untuk melakukan pembayaran ke TestingAja</li>
                        <li>Berikan informasi KODE PEMBAYARAN yang tertera di Aplikasi atau Website kepada kasir</li>
                        <li>Pastikan jumlah pembayaran di tempat anda berbelanja sama dengan jumlah yang diberitahukan oleh kasir, lalu konfirmasi pembayaran</li>
                        <li>Simpan bukti pembayaran dari Indomaret</li>
                        <li>Pembayaran Indomaret anda sudah selesai</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/xendit/chargeIndomaret">Bayar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script id="midtrans-script" type="text/javascript" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="sandbox" data-client-key="SB-Mid-client-SOT7b8W7C_UZqv4U"></script>

<script>
    function getToken(){
        console.log('jalan');
    var cardData = {
        "card_number": document.getElementById('card_number').value,
        "card_exp_month": document.getElementById('card_exp_month').value,
        "card_exp_year": document.getElementById('card_exp_year').value,
        "card_cvv": document.getElementById('card_cvv').value,
    }
    
    var alertBox = document.getElementById('card_validation_status');
    var options = {
        onSuccess: function(response){
        alertBox.classList.remove("d-none");
        alertBox.classList.add("alert-success");
        alertBox.innerHTML = 'Validasi Sukses, Mengalihkan ke halaman pembayaran...';
        
        var token_id = response.token_id;
        document.getElementById('card_token').value = token_id;
        var submitButton = document.getElementById('cardSubmitButton');
        setTimeout(function(){ submitButton.click()}, 2500);
        
        },
        onFailure: function(response){
        alertBox.classList.remove("d-none");
        alertBox.classList.add("alert-danger");
        alertBox.innerHTML = 'Validasi Gagal, Coba Lagi';

        }
    };
    
    MidtransNew3ds.getCardToken(cardData, options);
    }
</script>
@endsection