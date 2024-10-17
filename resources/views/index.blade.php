@extends('layouts.app')

@section('content')
<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Menu
      </h2>
    </div>

    <ul class="filters_menu">
      <li class="active" data-filter="*">All</li>
      <li data-filter=".makanan">Makanan</li>
      <li data-filter=".minuman">Minuman</li>
    </ul>

    <div class="filters-content">
      <div class="row grid">
        @foreach($menus as $menu)
        <div class="col-sm-6 col-lg-4 all {{ $menu->category }}">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="{{ asset('storage/menu/' . $menu->img) }}" alt="">
              </div>
              <div class="detail-box">
                <h5>{{ $menu->nama }}</h5>
                <p>{{ $menu->desc }}</p>
                <div class="options">
                  <h6>Rp. {{ number_format($menu->price, 0, ',', '.') }}</h6>
                  <a href="#" class="btn-info" data-id="{{ $menu->id }}">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                      <!-- SVG content here -->
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="menuModal{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel{{ $menu->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="menuModalLabel{{ $menu->id }}">{{ $menu->nama }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{ asset('storage/menu/' . $menu->img) }}" alt="{{ $menu->nama }}" class="img-fluid mb-3">
            <p>{{ $menu->desc }}</p>
            <h6>Rp. {{ number_format($menu->price, 0, ',', '.') }}</h6>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- end food section -->

<!-- about section -->

<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="{{ asset('img/about-img.png') }}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              We Are Feane
            </h2>
          </div>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
            in some form, by injected humour, or randomised words which don't look even slightly believable. If you
            are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
            the middle of text. All
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.btn-info').on('click', function(e) {
      e.preventDefault();
      var id = $(this).data('id');

      $.ajax({
        url: '/index/' + id,
        method: 'GET',
        success: function(data) {
          $('#modal-name').text(data.nama);
          $('#modal-description').text(data.desc);
          $('#modal-price').text('Rp. ' + new Intl.NumberFormat().format(data.price));
          $('#modal-image').attr('src', '{{ asset(' ') }}' + data.img);
          $('#menuModal').modal('show');
        },
        error: function() {
          alert('Error retrieving menu details.');
        }
      });
    });
  });
</script>
@endsection