## Test Suite

Two ways to run the test suite:

- `php test.php` from command line
- open `test.php` in a browser

### Info

Simple test suite organized into test cases. Each test case tests one class implementation. E.g. `FormLexer_TestCase.php` tests `\OFM\App\FormLexer` class.

Test cases extend the `\OFM\Test\TestCase.php` class which keeps internal counter of how many assertions are made in each test case, how many assertions passed and how many failed.

### Test metrics

No metrics is currently being computed.

### Output

Sample output

```
[FormLexer_TestCase]: tests 2, passing 2, failed 0
[FormParser_TestCase]: tests 0, passing 0, failed 0
[Input_TestCase]: tests 4, passing 4, failed 0
[Button_TestCase]: tests 4, passing 4, failed 0
[Selectbox_TestCase]: tests 0, passing 0, failed 0
[Textarea_TestCase]: tests 4, passing 4, failed 0
[Title_TestCase]: tests 2, passing 2, failed 0

Summary
Test cases:     7
Total tests:    16
Total passing:  16
Totatl failing: 0
```
