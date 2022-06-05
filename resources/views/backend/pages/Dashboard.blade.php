@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{ $wisata }}</h3>
          
                          <p>Object Wisata</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-torii-gate"></i>
                        </div>
                        <a href="{{ route('admin.wisata.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{ $article }}</h3>
          
                          <p>Artikel</p>
                        </div>
                        <div class="icon">
                          <i class="far fa-newspaper"></i>
                        </div>
                        <a href="{{ route('admin.article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{ $review }}</h3>
          
                          <p>Ulasan</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-star"></i>
                        </div>
                        <a href="{{ route('admin.review.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{ $user }}</h3>
          
                          <p>User</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection