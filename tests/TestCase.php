<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}



  <div class="mb-3">
                    <label for="image" class="form-label">Image(s)</label><br>
                    @if(isset($produit) && $produit->images->count() > 0)
                        <div class="mb-2">
                            @foreach($produit->images as $img)
                                <img src="{{ asset('photos/'.$img->nom) }}" alt="Image" width="100" class="me-2">
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Vous pouvez sélectionner plusieurs images</small>
                </div>