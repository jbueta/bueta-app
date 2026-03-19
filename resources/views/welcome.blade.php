<x-layout>
    <x-slot name="heading">
        Welcome to {{ $name }}
    </x-slot>

 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome</h1>
                    <p class="lead">This is your application welcome page.</p>
                    <hr class="my-4">
                    <p>
                        <a class="btn btn-primary btn-lg" href="/products" role="button">
                            View Products
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
        
</x-layout>