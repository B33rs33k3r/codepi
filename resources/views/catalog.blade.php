
@extends('welcome')

@section('content')

    <div class="grid-x catalog-grid resource-grid">
        <div class="cell small-12 medium-10 large-8">
            <list :list="{{ $catalogs->toJson() }}">
                <template #form>
                    <catalog-create-form></catalog-create-form>
                </template>

                <template #list-item="slotProps">
                    <catalog :catalog-item="slotProps.item">
                        <template #list="slotProps">
                            <list :list="slotProps.list" :list-class="slotProps.listClass">
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
                        </template>
                    </catalog>
                </template>
            </list>
        </div>
    </div>

@endsection