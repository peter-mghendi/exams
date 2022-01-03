<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Exams</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased font-sans">
    <div class="m-4">
        <ul class="bg-cyan-100 rounded-xl p-1.5 flex">
            @foreach ($categories as $key => $value)
            <li class="flex-1">
                <buttton class="trigger w-100 block p-2 rounded-lg
                    text-sm font-medium text-cyan-700 capitalize 
                    @if($loop->first) bg-white shadow-sm @endif" data-category="{{ $key }}">
                    {{ $key }}
                    </button>
            </li>
            @endforeach
            <li class="flex-1">
                <a class="trigger w-100 block p-2 rounded-lg text-sm font-medium text-cyan-700" href="{{ route('new') }}">
                    Create New Question
                </a>
            </li>
        </ul>
    </div>
    <div class="mx-4 mt-4">
        @foreach ($categories as $key => $value)
        <div id="{{ $key }}" class="tab @if(!$loop->first) hidden @endif">
            @foreach ($value as $question)
            <div class="p-4 rounded-lg hover:shadow mb-2">
                <p class="mb-2">{{ $loop->iteration }}. {{ $question->question }}</p>
                @foreach ($question->options as $option)
                <div class="mb-1">
                    <input type="radio" name="{{ $question->id }}" value="{{ $option->option }}">
                    {{ $option->option }}. {{ $option->text }}
                </div>
                @endforeach

                <button class="p-2 mt-2 rounded-lg hover:text-gray-50 hover:bg-gradient-to-r from-green-200 via-green-300 to-blue-500">Check Answer</button>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</body>

<script>
    const triggers = document.querySelectorAll('.trigger');
    const tabs = document.querySelectorAll('.tab');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            triggers.forEach(trigger => {
                trigger.classList.remove('bg-white');
                trigger.classList.remove('shadow-sm');
            });

            trigger.classList.add('bg-white');
            trigger.classList.add('shadow-sm');

            tabs.forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(trigger.dataset.category).classList.remove('hidden');
        });
    });
</script>

</html>