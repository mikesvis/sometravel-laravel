@extends('layouts.front.index')

@section('content')

    @include('front.components.breadcrumbs')

    @include('front.components.page-heading', ['heading' => 'Изменения в шенгенском законодательстве'])

    <div class="container vpm__pb">
        <div class="row">
            <div class="col-12">

                <div class="newsCard">
                    <a href="" class="newsCard__visual"><img src="@include('front.components.dummyImage', ['w' => 870, 'h'=>458])" class="w-100 panelRounded panelShadow" alt=""></a>
                    <p>01.12.2019</p>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Грустный дал, обеспечивает прямо это переписали необходимыми пунктуация собрал, подзаголовок что живет страну о, имени ручеек своего текста силуэт гор.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem iste, autem perspiciatis debitis sint molestias. Ratione dolorum molestias sapiente adipisci dolore quod obcaecati, harum maiores tenetur aut modi provident, maxime fugit? Itaque, vitae! Maiores recusandae assumenda modi eius, ut expedita, unde hic totam asperiores quibusdam eos nulla quidem veritatis dolores nisi dolore blanditiis voluptas eveniet consequatur atque quam quas! Quo numquam, commodi, fugit suscipit error ipsa ut tenetur cum, nesciunt praesentium culpa id pariatur sint in tempora veniam sit accusantium aut quam quis? Alias saepe molestias cupiditate consequuntur sint voluptatem iste. Neque dolores enim veritatis facilis repudiandae fugiat accusamus accusantium.</p>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут, рыбные тексты. Переписали оксмокс океана власти толку необходимыми снова вопроса напоивший повстречался имеет, коварных дал силуэт ведущими его, образ маленький выйти безопасную.</p>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Встретил мир вдали которой она решила, что курсивных выйти от всех дорогу предупредила строчка сбить ты одна всеми заголовок деревни собрал!</p>
                </div>


            </div>
        </div>
    </div>


    {{-- @include('front.components.listings.directions') --}}

    @include('front.components.listings.news')

    @include('front.components.forms.visa-question',
                [
                    'heading' => '<span class="text-primary">У вас остались вопросы</span> по оформлению визы?',
                    'subHeading' => 'Оставьте номер телефона и наши специалист вам перезвонит'
                ]
            )

@endsection
