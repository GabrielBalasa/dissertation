@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/settiers"> {{-- Form to allow trainer to set or edit tiers --}}
            <h2 class="mb-4">Set subscription tiers</h2> {{-- Trainer menu set tiers page --}}
                @if(count($errors)) {{-- Error in case the trainer tries to delete or not set at least tier 1 --}}
                    <div class="form-group verticalHeight20 my-5 pb-3">
                        <div class="alert p-0  alert-danger">
                            <ul class="list-unstyled m-2">
                                At least tier 1 is required. If you wish to remove your tiers completely, please contact us.
                            </ul>
                        </div>
                    </div>
                @endif
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-12 mb-2">
                    <label for="tier1_price">Tier 1 price:</label>
                    <input type="text" class="form-control" id="tier1_price" name="tier1_price" value="{{$subscription['tier1_price']??''}}">
                </div>
                
                <div class="col-12 mb-2">
                    <label for="tier1_description">Tier 1 description:</label>
                    <textarea type="text" class="form-control" id="tier1_description" name="tier1_description" rows="5" cols="50">{{$subscription['tier1_description']??''}}</textarea>
                </div>
        
                <div class="col-12 mb-2">
                    <label for="tier2_price">Tier 2 price:</label>
                    <input type="text" class="form-control" id="tier2_price" name="tier2_price" value="{{$subscription['tier2_price']??''}}">
                </div>
                
                <div class="col-12 mb-2">
                    <label for="tier2_description">Tier 2 description:</label>
                    <textarea type="text" class="form-control" id="tier2_description" name="tier2_description" rows="5" cols="50">{{$subscription['tier2_description']??''}}</textarea>
                </div>
                
                <div class="col-12 mb-2">
                    <label for="tier3_price">Tier 3 price:</label>
                    <input type="text" class="form-control" id="tier3_price" name="tier3_price" value="{{$subscription['tier3_price']??''}}">
                </div>
                
                <div class="col-12 mb-2">
                    <label for="tier3_description">Tier 3 description:</label>
                    <textarea type="text" class="form-control" id="tier3_description" name="tier3_description" rows="5" cols="50">{{$subscription['tier3_description']??''}}</textarea>
                </div>
        
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection 