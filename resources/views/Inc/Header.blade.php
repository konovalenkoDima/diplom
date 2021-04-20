<header>
    <div class="inner-width">
        <a href="#" class="logo">
            <p>
                Directed by Dmitriy Konovalenko
            </p>
        </a>

            <i class="menu-toggle-btn fas fa-bars"></i>
            <nav class="navigation-menu">
                <a href="{{route('home')}}"><i class="fas fa-home home"></i>Главная</a>
                <a href="{{route('workers')}}"><i class="fas fa-users team"></i>Работники</a>
                <a href="#"><i class="fas fa-tasks tasks"></i>Задания</a>
                <a href="#"><i class="fab fa-buffer works"></i>Проекты</a>
            </nav>

    </div>
</header>
<script type="text/javascript">
    $(".menu-toggle-btn").click(function (){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
    });
</script>
