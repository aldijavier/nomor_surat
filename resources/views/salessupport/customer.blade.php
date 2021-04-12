@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customer Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form role="form">
                    <div class="card-body">
                        <h2>Informasi Perusahaan</h2>
                        <div class="form-group">
                            <label for="inputcompanyname">Nama Perusahaan</label>
                            <input type="company_name" class="form-control" id="inputcompanyname"
                                placeholder="Input Nama Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="inputbusinesstype">Jenis/Bidang Usaha</label>
                            <input type="business_type" class="form-control" id="inputbusinesstype"
                                placeholder="Pilih Jenis / Bidang Usaha">
                        </div>
                        <div class="form-group">
                            <label for="inputnpwp">No. NPWP</label>
                            <input type="npwp" class="form-control" id="inputnpwp" placeholder="Input Nomor NPWP">
                        </div>
                        <div class="form-group">
                            <label for="inputnpwpaddress">Alamat NPWP</label>
                            <input type="npwp_address" class="form-control" id="inputnpwpaddress"
                                placeholder="Input Alamat NPWP">
                        </div>
                        <div class="form-group">
                            <label for="inputcompanyaddress">Alamat Perusahaan</label>
                            <input type="company_address" class="form-control" id="inputcompanyaddress"
                                placeholder="Input Alamat Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="inputphone">No. Telp</label>
                            <input type="phoneno" class="form-control" id="inputphone" placeholder="Input No. Telp">
                        </div>
                        <div class="form-group">
                            <label for="inputfax">No. Fax</label>
                            <input type="faxno" class="form-control" id="inputfax" placeholder="Input No. Fax">
                        </div>
                        <div class="form-group">
                            <label for="inputwebsite">Alamat Web</label>
                            <input type="website" class="form-control" id="inputwebsite" placeholder="Input Alamat Web">
                        </div>

                        <hr style="height:10px">

                        <h2>Nama yang diberi wewenang</h2>
                        <div class="form-group">
                            <label for="inputauthorized">Nama yang diberi wewenang</label>
                            <input type="auth_person" class="form-control" id="inputauthorized"
                                placeholder="Input Nama diberi wewenang">
                        </div>
                        <div class="form-group">
                            <label for="inputjobtitle">Bagian / Jabatan</label>
                            <input type="auth_job" class="form-control" id="inputjobtitle"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputauthtel">No. Telp / Handphone</label>
                            <input type="auth_tel" class="form-control" id="inputauthtel"
                                placeholder="Input Telp / Handphone">
                        </div>

                        <div class="form-group">
                            <label for="inputauthemail">Alamat Email</label>
                            <input type="auth_email" class="form-control" id="inputauthemail"
                                placeholder="Input Alamat Email">
                        </div>

                        <hr style="height:10px">

                        <h2>Penanggung Jawab Teknis</h2>
                        <div class="form-group">
                            <label for="inputtech1">Kontak Teknis 1</label>
                            <input type="techname1" class="form-control" id="inputtech1"
                                placeholder="Input Nama Kontak Teknis (1)">
                        </div>

                        <div class="form-group">
                            <label for="inputtechjob1">Bagian / Jabatan</label>
                            <input type="techjob1" class="form-control" id="inputtechjob1"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputtechemail1">Alamat Email</label>
                            <input type="techemail1" class="form-control" id="inputtechemail1"
                                placeholder="Input Alamat Email">
                        </div>

                        <div class="form-group">
                            <label for="inputtech_cp2">Kontak Teknis 2</label>
                            <input type="tech_cp2" class="form-control" id="inputtech_cp2"
                                placeholder="Input Nama Kontak Teknis (2)">
                        </div>

                        <div class="form-group">
                            <label for="inputtechjob2">Bagian / Jabatan</label>
                            <input type="techjob2" class="form-control" id="inputtechjob2"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputtechemail2">Alamat Email</label>
                            <input type="techemail2" class="form-control" id="inputtechemail2"
                                placeholder="Input Alamat Email">
                        </div>

                        <hr>
                        <h2>Penanggung Jawab Invoice</h2>

                        <div class="form-group">
                            <label for="inputinvoice">Kontak Penagihan</label>
                            <input type="invoice_cp" class="form-control" id="inputinvoice"
                                placeholder="Input Nama Kontak Penagihan">
                        </div>

                        <div class="form-group">
                            <label for="inputinvoicejob">Bagian / Jabatan </label>
                            <input type="invoicecp_job" class="form-control" id="inputinvoicejob"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputinvoicetel">No.Telp / Handphone</label>
                            <input type="invoicecp_tel" class="form-control" id="inputinvoicetel"
                                placeholder="Input Nomor Telp">
                        </div>

                        <div class="form-group">
                            <label for="inputinvoiceemail">Alamat Email</label>
                            <input type="invoicecp_email" class="form-control" id="inputinvoiceemail"
                                placeholder="Input Alamat Email">
                        </div>

                        <div></div>

                        <div class="form-group">
                            <label for="inputpayment">Kontak Pembayaran</label>
                            <input type="payment_cp" class="form-control" id="inputpayment"
                                placeholder="Input Nama Kontak Pembayaran">
                        </div>

                        <div class="form-group">
                            <label for="inputpaymentjob">Bagian / Jabatan </label>
                            <input type="paymentcp_job" class="form-control" id="inputpaymentjob"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputpaymenttel">No.Telp / Handphone</label>
                            <input type="paymentcp_tel" class="form-control" id="inputpaymenttel"
                                placeholder="Input Nomor Telp">
                        </div>

                        <div class="form-group">
                            <label for="inputpaymentemail">Alamat Email</label>
                            <input type="paymentcp_email" class="form-control" id="inputpaymentemail"
                                placeholder="Input Alamat Email">
                        </div>

                        <hr>
                        <h2>Penanggung Jawab Administrasi</h2>

                        <div class="form-group">
                            <label for="inputadmin">Kontak Administrasi</label>
                            <input type="admin_cp" class="form-control" id="inputadmin"
                                placeholder="Input Nama Kontak Administrasi">
                        </div>

                        <div class="form-group">
                            <label for="inputadminjob">Bagian / Jabatan </label>
                            <input type="admincp_job" class="form-control" id="inputadminjob"
                                placeholder="Input Bagian / Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="inputadmintel">No.Telp / Handphone</label>
                            <input type="admincp_tel" class="form-control" id="inputadmintel"
                                placeholder="Input Nomor Telp">
                        </div>

                        <div class="form-group">
                            <label for="inputadminemail">Alamat Email</label>
                            <input type="admincp_email" class="form-control" id="inputadminemail"
                                placeholder="Input Alamat Email">
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
    </section>
</div>
@endsection