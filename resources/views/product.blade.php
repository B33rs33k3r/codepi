
@extends('welcome')

@section('content')

<div class="grid-x category-grid resource-grid">
    <div class="cell small-12 medium-12 large-10">
        <list :list="{{ $products->toJson() }}"
            :optional-data="{catalogs: {{ $catalogs->toJson() }}, 'categories': {{ $categories->toJson() }}}">
            <template #form="slotProps">
                <product-create-form :catalog-list="slotProps.optionalData.catalogs"
                    :category-list="slotProps.optionalData.categories">
                </product-create-form>
            </template>

            <template #list-item="slotProps">
                <product-card-action :product-item="slotProps.item"
                    :catalog-list="slotProps.optionalData.catalogs"
                    :category-list="slotProps.optionalData.categories">
                    <template #list-catalog="slotProps">
                        <list :list="slotProps.list" :list-class="slotProps.listClass">
                            <template #list-item="slotProps">
                                <catalog-pill :catalog-item="slotProps.item"></catalog-pill>
                            </template>
                        </list>
                    </template>

                    <template #list-category="slotProps">
                        <list :list="slotProps.list" :list-class="slotProps.listClass">
                            <template #list-item="slotProps">
                                <category-pill :category-item="slotProps.item"></category-pill>
                            </template>
                        </list>
                    </template>
                </product-card-action>
            </template>
        </list>
    </div>
</div>

@endsection