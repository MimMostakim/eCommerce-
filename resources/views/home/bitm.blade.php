<h1>Hello Bitm</h1>
<a href="{{ route('bitm') }}">Bitm</a>
<a href="<?php echo route('pencilbox') ?>">PencilBox</a>

<form method="post" action="<?php echo url('/my-form') ?>">
    @csrf
    <input type="text" name="name">
    <button type="submit">Check</button>
</form>