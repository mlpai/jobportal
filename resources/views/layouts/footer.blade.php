<footer class="site-footer">
    <div class="container">
        <div class="row">
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="footer-social">
                    {!!
                        Share::currentPage('Apply for Jobs here @ ')
                        ->facebook()
                        ->twitter()
                        ->linkedin('Apply this job')
                        ->whatsapp();
                        !!}
            </div>
        </div>
        <div class="offset-md-4 col-6 col-md-3 mb-4 mb-md-0">
            <h4 class="text-light">Subscribe our Newsletter</h4>
            <form method="post" action="{{route('newsletter')}}" >
                @csrf
                <div class="input-group mb-3">
                    <input type="email" required value='{{old('newsletter')}}' name="newsletter" class="form-control" placeholder="Recipient's email" aria-label="Recipient's email" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Button</button>
                    </div>
                  </div>
            </form>
        </div>
        </div>

    </div>
</footer>

@push('styles')
<style>
    #social-links li {
        float:left ;
        display: inline;
        margin-right: 10px;
        padding: 0px;
        text-align: center;
        line-height: 40px;
    }
    #social-links li:hover a {
    color:#1644ba;
    }
</style>
@endpush

@push('scripts')

    @error('newsletter')

        <script>
            swal.fire({
                title: 'Oops!',
                text: '{{$message}}',
                type: 'error',
                confirmButtonText: 'Ok'
            });
        </script>
      @enderror
        @if(Session::has('success'))
            <script>
                swal.fire({
                    title: @if(Session::has('Title')) '{{Session('Title')}}' @else 'Thanks For Subscribe !' @endif,
                    text: '{{Session('success')}}',
                    type: 'Success',
                    confirmButtonText: 'Ok'
                });
            </script>
        @endif
@endpush
