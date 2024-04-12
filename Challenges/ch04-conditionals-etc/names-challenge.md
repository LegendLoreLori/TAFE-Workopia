# Names Challenge

## Instructions

1. Take the array of names below and loop through them. The type of loop is up to you.
2. Within the loop, use a conditional statement to check if the first letter of the name is 'A'.
3. If the first letter is 'A', skip that name and continue to the next iteration.
4. If the first letter is not 'A', reverse the string.
5. Make all names lowercase before printing them.

### Hints

- You can use indexes to access the first character of a string. ($string[0]) or you can use the `substr()` function.
- You can reverse a string using the `strrev()` function.
- You can make a string lowercase using the `strtolower()` function.
- You can skip an iteration of a loop using the `continue` keyword.

```php
$names = ['Alex', 'Beth', 'Caroline', 'Dave', 'Elanor', 'Anna', 'Freddie', 'Adam'];
```

<details>
  <summary>Click For Solution</summary>

## Solution #1 - foreach loop & index

```php
foreach ($names as $name) {
    if ($name[0] === 'A') {
        continue;
    }

    echo strtolower(strrev($name)) . '<br>';
}
```

I loop through using a foreach loop. I used the index 0 of the string to get the first letter to see if it is A. If so, I continue and skip the iteration. If not, I lowercase and reverse it.

## Solution #2 - for loop & substr()

```php
for ($i = 0; $i < count($names); $i++) {
  $name = $names[$i];

  if (substr($name, 0, 1) === 'A') {
    continue;
  }
  $reversedName = strtolower(strrev($name));
  echo $reversedName . '<br>';
}
```
I loop through using a for loop. I get the current iteration name using the $i index. I use the substr method to get the first character and see if it is A. If it is, we continue. If not, we reverse and lowercase.

Just to show you another way of doing this, we can also iterate backwards.


```php
for ($i = count($names) - 1; $i >= 0; $i--) {
  $name = $names[$i];
  if (substr($name, 0, 1) === 'A') {
      continue;
  }
  $reversedName = strtolower(strrev($name));
  echo $reversedName . '<br>';
}
```

</details>
