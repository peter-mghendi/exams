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
        <div class="bg-cyan-100 rounded-xl p-1.5 flex">
            Create a new question
        </div>
    </div>
    <div class="mx-4 mt-4">
        <form action="/questions" method="POST">
            @csrf
            <div>
                <label for="question">Question Text</label>
                <input type="text" name="question" id="question" required>
            </div>
            <div>
                <label for="option_a">Option A</label>
                <input type="text" name="option_a" id="option_a" required>
            </div>
            <div>
                <label for="option_b">Option B</label>
                <input type="text" name="option_b" id="option_b" required>
            </div>
            <div>
                <label for="option_c">Option C</label>
                <input type="text" name="option_c" id="option_c" required>
            </div>
            <div>
                <label for="option_d">Option D</label>
                <input type="text" name="option_d" id="option_d" required>
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" name="category" id="category" required>
            </div>
            <div>
                <label for="answer">Question Text</label>
                <select name="answer" id="answer">
                    <option value="a">Option A</option>
                    <option value="b">Option B</option>
                    <option value="c">Option C</option>
                    <option value="d">Option D</option>
                </select>
            </div>
            <input type="submit">
        </form>
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