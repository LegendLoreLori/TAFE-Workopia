# Challenge: Dynamic Job Listings Page

We are going to make the jobs listings page a bit more dynamic. I want to add 3 new features. If you would like, you can do this as a challenge.

I changed things up a bit and renamed the title to `Job Listings`. I got rid of the `$heading` and `$body` variables and that section at the top. From now on, we will not need that.

Let's first look at the starter code:

```php
<?php
$title = 'Job Listings';

$listings = [
[
    'id' => 1,
    'title' => 'Software Engineer',
    'description' => 'We are seeking a skilled software engineer to develop high-quality software solutions.',
    'salary' => 80000,
    'location' => 'San Francisco',
    'tags' => ['Software Development', 'Java', 'Python']
],
[
    'id' => 2,
    'title' => 'Marketing Specialist',
    'description' => 'We are looking for a marketing specialist to develop and implement effective marketing strategies.',
    'salary' => 60000,
    'location' => 'New York',
    'tags' => ['Digital Marketing', 'Social Media', 'SEO']
],
[
    'id' => 3,
    'title' => 'Accountant',
    'description' => 'We are hiring an experienced accountant to handle financial transactions and ensure compliance.',
    'salary' => 55000,
    'location' => 'Chicago',
    'tags' => ['Accounting', 'Bookkeeping', 'Financial Reporting']
],
[
    'id' => 4,
    'title' => 'UX Designer',
    'description' => 'We are seeking a talented UX designer to create intuitive and visually appealing user interfaces.',
    'salary' => 70000,
    'location' => 'Seattle',
    'tags' => ['User Experience', 'Wireframing', 'Prototyping']
],
[
    'id' => 5,
    'title' => 'Customer Service Representative',
    'description' => 'We are looking for a friendly customer service representative to assist customers and resolve issues.',
    'salary' => 40000,
    'location' => 'New York',
    'tags' => []
],
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title><?php echo $title; ?></title>
</head>
<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
      <div class="container mx-auto">
          <h1 class="text-3xl font-semibold"><?php echo $title; ?></h1>
      </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
      <?php foreach ($listings as $index => $job): ?>
        <div class="md my-4">
          <div class="rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold"><?php echo $job['title']; ?></h2>
              <p class="text-gray-700 text-lg mt-2"><?php echo $job['description']; ?></p>
              <ul class="mt-4">
                <li class="mb-2">
                  <strong>Salary:</strong> <?php echo $job['salary']; ?>
                </li>
                <li class="mb-2">
                  <strong>Location:</strong> <?php echo $job['location']; ?>
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <?php echo implode(', ', $job['tags']); ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</body>
</html>
```

### Features

1. Make every other listing have a background color of light blue by adding a class of `bg-blue-100` if the index is even. Add the class of `bg-white` if the index is odd. Remember, we can get the index by using the `foreach` syntax: `foreach ($listings as $index => $job)`. We can then use the `$index` variable in our conditional.

This dynamic class should be added to the `div` that wraps each listing. It looks like this:

```php
<div class="rounded-lg shadow-md">
```

2. Let's pretend that you live in New York. I want you to add a badge that says "Local" next to the location if the location is New York. You can do this by adding a span with the class of `text-xs text-white bg-blue-500 rounded-full px-2 py-1 ml-2`. So you need to evaluate the location and if it is New York, add the span.

3. I have removed the tags from the last listing. If there are no tags, don't show the tags list. You can do this by using the `empty()` function. If the tags are empty, don't show the tags list.

If you want to try it out, go ahead and do that now.

Let's look at each of the steps, then I will show you the final code.

#### 1. Make Even Listings Light Blue

We can do this by adding a conditional to the class attribute of the `div` that wraps each listing. We can use the `if` and `else` syntax to check if the index is even or odd. If it is even, we add the class of `bg-blue-100`. If it is odd, we add the class of `bg-white`. Here is the code:

```php
<div class="rounded-lg shadow-md
<?php if ($index % 2 === 0): ?>
  bg-blue-100
<?php else: ?>
  bg-white
<?php endif; ?>">
  Rest of the code...
</div>
```

I do want to mention that there is a shorter, cleaner way to do this. We can use the ternary operator. We haven't got to that yet, but we will soon.

#### 2. Add Local Badge

We can do this by adding a conditional to the location. If the location is New York, we add the span. Here is the code:

```php
<li class="mb-2">
  <strong>Location:</strong> <?php echo $job['location']; ?>
  <?php if ($job['location'] === 'New York'): ?>
    <span class="text-xs text-white bg-blue-500 rounded-full px-2 py-1 ml-2">Local</span>
  <?php endif; ?>
</li>
```

<br>

#### 3. Don't Show Tags List If Tags Are Empty

We can do this by adding a conditional and using the `empty` function. If the tags are empty, we don't show the tags list. Here is the code:

```php
<?php if (!empty($job['tags'])): ?>
  <li class="mb-2">
    <strong>Tags:</strong> <?php echo implode(', ', $job['tags']); ?>
  </li>
<?php endif; ?>
```

#### Final Code

```php
<?php
$title = 'PHP For Beginners';
$heading = 'Welcome to the course';
$body = 'In this course, you will learn the fundamentals of the PHP language';
$output = null;

$listings = [
[
    'id' => 1,
    'title' => 'Software Engineer',
    'description' => 'We are seeking a skilled software engineer to develop high-quality software solutions.',
    'salary' => 80000,
    'location' => 'San Francisco',
    'tags' => ['Software Development', 'Java', 'Python']
],
[
    'id' => 2,
    'title' => 'Marketing Specialist',
    'description' => 'We are looking for a marketing specialist to develop and implement effective marketing strategies.',
    'salary' => 60000,
    'location' => 'New York',
    'tags' => ['Digital Marketing', 'Social Media', 'SEO']
],
[
    'id' => 3,
    'title' => 'Accountant',
    'description' => 'We are hiring an experienced accountant to handle financial transactions and ensure compliance.',
    'salary' => 55000,
    'location' => 'Chicago',
    'tags' => ['Accounting', 'Bookkeeping', 'Financial Reporting']
],
[
    'id' => 4,
    'title' => 'UX Designer',
    'description' => 'We are seeking a talented UX designer to create intuitive and visually appealing user interfaces.',
    'salary' => 70000,
    'location' => 'Seattle',
    'tags' => ['User Experience', 'Wireframing', 'Prototyping']
],
[
    'id' => 5,
    'title' => 'Customer Service Representative',
    'description' => 'We are looking for a friendly customer service representative to assist customers and resolve issues.',
    'salary' => 40000,
    'location' => 'New York',
    'tags' => []
],
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title><?php echo $title; ?></title>
</head>
<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
      <div class="container mx-auto">
          <h1 class="text-3xl font-semibold"><?php echo $title; ?></h1>
      </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
      <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-2xl font-semibold mb-4"><?php echo $heading?></h2>
          <p><?php echo $body; ?></p>
      </div>
      <!-- Output -->
      <?php foreach ($listings as $index => $job): ?>
        <div class="md my-4">
          <div class="rounded-lg shadow-md
          <?php if ($index % 2 === 0): ?>
            bg-blue-100
          <?php else: ?>
            bg-white
          <?php endif; ?>">
            <div class="p-4">
              <h2 class="text-xl font-semibold"><?php echo $job['title']; ?></h2>
              <p class="text-gray-700 text-lg mt-2"><?php echo $job['description']; ?></p>
              <ul class="mt-4">
                <li class="mb-2">
                  <strong>Salary:</strong> <?php echo $job['salary']; ?>
                </li>
                <li class="mb-2">
                  <strong>Location:</strong> <?php echo $job['location']; ?>
                  <?php if ($job['location'] === 'New York'): ?>
                    <span class="text-xs text-white bg-blue-500 rounded-full px-2 py-1 ml-2">Local</span>
                  <?php endif; ?>
                </li>
                <?php if (!empty($job['tags'])): ?>
                  <li class="mb-2">
                    <strong>Tags:</strong> <?php echo implode(', ', $job['tags']); ?>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</body>
</html>
```
