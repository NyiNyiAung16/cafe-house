@props(['product','email'])

<div class="mailContainer">
    <h2 class="title">Notify for new product</h2>
    <div class="content">
        <p class="name">Product Name -{{ $product->name }}</p>
        <p class="price">Price - ${{ $product->price }}</p>
    </div>
    <footer>
        <a href="mailto:{{$email}}">{{ $email }}</a>
        <p>Mail from Coffee-shop website</p>
    </footer>
</div>