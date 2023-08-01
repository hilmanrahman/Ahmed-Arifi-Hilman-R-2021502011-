<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Ekstrakulikuler MTs Miftahul Ulum Gayam
            </h3>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-person-harassing"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h4>Pramuka</h4>
                                </span>
                                <span class="info-box-number">
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-person-circle-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h4>Tahsinul Qiro'ah</h4>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-pen-nib"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h4>Kaligrafi</h4>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-futbol"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h4>Sepak Bola</h4>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
    </div>
    <?php
    echo $this->endSection();
