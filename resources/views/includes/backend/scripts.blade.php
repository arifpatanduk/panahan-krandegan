<script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/assets/js/template.js')}}"></script>
<script src="{{asset('backend/assets/js/settings.js')}}"></script>
<script src="{{asset('backend/assets/js/todolist.js')}}"></script>
<script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('backend/assets/js/dashboard.js')}}"></script>

{{-- alpine js --}}
<script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js"
    integrity="sha512-ZK6m9vADamSl5fxBPtXw6ho6A4TuX89HUbcfvxa2v2NYNT/7l8yFGJ3JlXyMN4hlNbz0il4k6DvqbIW5CCwqkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('addon-scripts')
@livewireScripts