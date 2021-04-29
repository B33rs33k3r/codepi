
@extends('welcome')

@section('content')

<div class="grid-x category-grid resource-grid">
    <div class="cell small-12 medium-12 large-10">
        <list :list="{{ $products->toJson() }}">
            <template #form>
                
            </template>

            <template #list-item="slotProps">
                <product-card :product-item="slotProps.item">
                    <template #list="slotProps">
                        <list :list="slotProps.list" :list-class="slotProps.listClass">
                            <template #list-item="slotProps">
                                <category-pill :category-item="slotProps.item"></category-pill>
                            </template>
                        </list>
                    </template>
                </product-card>
            </template>
        </list>
    </div>
</div>

@endsection