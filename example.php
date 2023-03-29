<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, sans-serif;
    }
    .group {
        border: 1px solid black;
        padding: 10px;
        margin: 10px;
    }
    .group label {
        display: block;
        margin: 5px;
        font-size: 14px;
    }
    .group input {
        margin: 5px;
        padding: 5px;
        width: clamp(100px, 50%, 300px);
        border: 1px solid #444;
        border-radius: 5px;
        transition: all .3s ease;
    }
    .group input:focus {
        outline: none;
        background-color: #ddd;
    }
    input[type="submit"] {
        width: 100px;
        color: #444;
        background-color: #ddd;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px;
        padding: 5px;
        transition: all .3s ease;
    }
    input[type="submit"]:hover {
        background-color: #ccc;
    }
    input[type="submit"]:active {
        background-color: #bbb;
    }
    .task-result {
        border: 1px solid black;
        padding: 10px;
        margin: 10px;
    }
</style>
<h1 style="text-align: center">Input</h1>
<form method="post">
    <div class="group">
        <h3>Task 1</h3>
        <label for="search_str">Search String: </label>
        <input type="text" id="search_str" name="search_str" placeholder="Enter a string to search character in" required>
        <label for="search_char">Search Character: </label>
        <input type="text" id="search_char" name="search_char" placeholder="Enter a character to search" maxlength="1" required>
    </div>
    <div class="group">
        <h3>Task 2</h3>
        <label for="replace_str">Replace String: </label>
        <input type="text" id="replace_str" name="replace_str" placeholder="Enter a string to replace character in" required>
        <label for="replace_char">Replace Character: </label>
        <input type="text" id="replace_char" name="replace_char" placeholder="Enter a character to replace" maxlength="1" required>
        <label for="replace_with">Replace With: </label>
        <input type="text" id="replace_with" name="replace_with" placeholder="Enter a character to replace with" maxlength="1" required>
    </div>
    <div class="group">
        <h3>Task 3</h3>
        <label for="inverse_str">Inverse String: </label>
        <input type="text" id="inverse_str" name="inverse_str" placeholder="Enter a string to inverse" required>
    </div>
    <div class="group">
        <h3>Task 4</h3>
        <label for="split_str">Split String: </label>
        <input type="text" id="split_str" name="split_str" placeholder="Enter a string to split" required>
    </div>
    <div class="group">
        <h3>Task 5</h3>
        <label for="alpha_str">Alphabet String: </label>
        <input type="text" id="alpha_str" name="alpha_str" placeholder="Enter a string to check alphabet" required>
    </div>
    <input type="submit" value="Submit" name="submit">
</form>
<?php if (isset($_POST['submit'])): ?>
<h1 style="text-align: center">Result</h1>
<?php endif; ?>
<?php
include_once 'library.php';
if (!isset($_POST['submit'])) {
    exit;
}
try {
    $char_count = count_char($_POST['search_str'], $_POST['search_char']);
    echo "<h4 class='task-result'>Task 1 result: character '$_POST[search_char]' occurs $char_count times in string '$_POST[search_str]'</h4>";
} catch (Exception $e) {
    echo "<h4 class='task-result'>Task 1 result: " . $e->getMessage() . "</h4>";
}
try {
    $new_string = replace($_POST['replace_str'], $_POST['replace_char'], $_POST['replace_with']);
    echo "<h4 class='task-result'>Task 2 result: string '$_POST[replace_str]' with character '$_POST[replace_char]' replaced with '$_POST[replace_with]' is '$new_string'</h4>";
} catch (Exception $e) {
    echo "<h4 class='task-result'>Task 2 result: " . $e->getMessage() . "</h4>";
}
$inverted_string = inverse($_POST['inverse_str']);
echo "<h4 class='task-result'>Task 3 result: string '$_POST[inverse_str]' inverted is '$inverted_string'</h4>";
$split_array = split_str($_POST['split_str']);
echo "<h4 class='task-result'>Task 4 result: string '$_POST[split_str]' split into array: ";
print_r($split_array);
echo "</h4>";
$alpha = get_alpha($_POST['alpha_str']);
echo "<h4 class='task-result'>Task 5 result: string '$_POST[alpha_str]' contains $alpha alphabet</h4>";
