---
created: 2023-10-01T17:02:02 (UTC +03:00)
tags: [reference,cheatsheet,code table,snippets,linux,script,shell,sh,echo,linux]
source: https://quickref.me/bash#getting-started
author:
---

# Bash Cheat Sheet & Quick Reference

> ## Excerpt
> This is a quick reference cheat sheet to getting started with linux bash shell scripting.

---

## [#](Basic Concepts)
### [#](quoting)

### Types of quoting

There are three standard types of quotes (or four if you count backslash escaping), and two nonstandard Bash extensions.

- Single quotes: '...' removes the special meaning of every character between the quotes. Everything inside single quotes becomes a literal string. The only character that you can't safely enclose in single quotes is a single quote.

- Double quotes: "..." prevents some substitutions but allows others. Every substitution that begins with a dollar sign $ is performed, as is the legacy `...` (backtick) command substitution. Backslash escaping is also performed. No word splitting or filename expansion is performed.

- Backticks: `...` is the legacy command substitution syntax; deprecated in favor of $(...) but still permitted for historical reasons. See FAQ 082 for details.

- Backslash: Putting \ in front of a metacharacter removes its special meaning. This works inside double quotes, or in the absence of quotes. It does not work inside single quotes.

- $'...' : Contents are a single word with interpretation of backslash escape sequences such as \n for newline, \t for tab, and \xnn for bytes specified in hexadecimal. These may be used to specify a text representation of arbitrary data. No current implementation supports a context where these are not interpreted as NUL-terminated C strings.

- $"..." : This is a Bash extension. It is used for localization support and will not be covered on this page.

### Effects of Quoting
[from: ](http://mywiki.wooledge.org/Quotes)

**Preserve unescaped metacharacters**
**Prevent field splitting and ignore glob pattern characters**
**Expand argument lists**

### When should you use **Quote**?

The basic rule of thumb is that you should double-quote every expansion. This prevents unwanted word splitting and globbing. When in doubt, quote it.
---

## [#](https://quickref.me/bash#getting-started)Getting Started

### [#](https://quickref.me/bash#hello-sh)hello.sh

```
#!/bin/bash

VAR="world"
echo "Hello $VAR!" # => Hello world!
```

Execute the script

```
$ bash hello.sh
```

### [#](https://quickref.me/bash#variables)Variables

```
NAME="John"

echo ${NAME}    # => John (Variables)
echo $NAME      # => John (Variables)
echo "$NAME"    # => John (Variables)
echo '$NAME'    # => $NAME (Exact string)
echo "${NAME}!" # => John! (Variables)

NAME = "John"   # => Error (about space)
```

```
# This is an inline Bash comment.
```

```
: '
This is a
very neat comment
in bash
'
```

Multi-line comments use `:'` to open and `'` to close

### [#](https://quickref.me/bash#arguments)Arguments

| Expression | Description |
| --- | --- |
| `$1` … `$9` | Parameter 1 ... 9 |
| `$0` | Name of the script itself |
| `$1` | First argument |
| `${10}` | Positional parameter 10 |
| `$#` | Number of arguments |
| `$$` | Process id of the shell |
| `$*` | All arguments |
| `$@` | All arguments, starting from first |
| `$-` | Current options |
| `$_` | Last argument of the previous command |

See: [Special parameters](http://wiki.bash-hackers.org/syntax/shellvars#special_parameters_and_shell_variables)

### [#](https://quickref.me/bash#functions)Functions

```
get_name() {
    echo "John"
}

echo "You are $(get_name)"
```

See: [Functions](https://quickref.me/bash#bash-functions)

### [#](https://quickref.me/bash#conditionals)Conditionals

```
if [[ -z "$string" ]]; then
    echo "String is empty"
elif [[ -n "$string" ]]; then
    echo "String is not empty"
fi
```

See: [Conditionals](https://quickref.me/bash#bash-conditionals)

### [#](https://quickref.me/bash#brace-expansion)Brace expansion

```
echo {A,B}.js
```

___

| Expression | Description |
| --- | --- |
| `{A,B}` | Same as `A B` |
| `{A,B}.js` | Same as `A.js B.js` |
| `{1..5}` | Same as `1 2 3 4 5` |

See: [Brace expansion](http://wiki.bash-hackers.org/syntax/expansion/brace)

### [#](https://quickref.me/bash#shell-execution)Shell execution

```
# => I'm in /path/of/current
echo "I'm in $(PWD)"

# Same as:
echo "I'm in `pwd`"
```

See: [Command substitution](http://wiki.bash-hackers.org/syntax/expansion/cmdsubst)

## [#](https://quickref.me/bash#bash-parameter-expansions)Bash Parameter expansions

### [#](https://quickref.me/bash#syntax)Syntax

| Code | Description |
| --- | --- |
| `${FOO%suffix}` | Remove suffix |
| `${FOO#prefix}` | Remove prefix |
| `${FOO%%suffix}` | Remove long suffix |
| `${FOO##prefix}` | Remove long prefix |
| `${FOO/from/to}` | Replace first match |
| `${FOO//from/to}` | Replace all |
| `${FOO/%from/to}` | Replace suffix |
| `${FOO/#from/to}` | Replace prefix |

#### [#](https://quickref.me/bash#substrings)Substrings

| Expression | Description |
| --- | --- |
| `${FOO:0:3}` | Substring _(position, length)_ |
| `${FOO:(-3):3}` | Substring from the right |

#### [#](https://quickref.me/bash#length)Length

| Expression | Description |
| --- | --- |
| `${#FOO}` | Length of `$FOO` |

#### [#](https://quickref.me/bash#default-values)Default values

| Expression | Description |
| --- | --- |
| `${FOO:-val}` | `$FOO`, or `val` if unset |
| `${FOO:=val}` | Set `$FOO` to `val` if unset |
| `${FOO:+val}` | `val` if `$FOO` is set |
| `${FOO:?message}` | Show message and exit if `$FOO` is unset |

### [#](https://quickref.me/bash#substitution)Substitution

```
echo ${food:-Cake}  #=> $food or "Cake"
```

```
STR="/path/to/foo.cpp"
echo ${STR%.cpp}    # /path/to/foo
echo ${STR%.cpp}.o  # /path/to/foo.o
echo ${STR%/*}      # /path/to

echo ${STR##*.}     # cpp (extension)
echo ${STR##*/}     # foo.cpp (basepath)

echo ${STR#*/}      # path/to/foo.cpp
echo ${STR##*/}     # foo.cpp

echo ${STR/foo/bar} # /path/to/bar.cpp
```

### [#](https://quickref.me/bash#slicing)Slicing

```
name="John"
echo ${name}           # => John
echo ${name:0:2}       # => Jo
echo ${name::2}        # => Jo
echo ${name::-1}       # => Joh
echo ${name:(-1)}      # => n
echo ${name:(-2)}      # => hn
echo ${name:(-2):2}    # => hn

length=2
echo ${name:0:length}  # => Jo
```

See: [Parameter expansion](http://wiki.bash-hackers.org/syntax/pe)

### [#](https://quickref.me/bash#basepath-dirpath)basepath & dirpath

```
SRC="/path/to/foo.cpp"
```

```
BASEPATH=${SRC##*/}   
echo $BASEPATH  # => "foo.cpp"


DIRPATH=${SRC%$BASEPATH}
echo $DIRPATH   # => "/path/to/"
```

### [#](https://quickref.me/bash#transform)Transform

```
STR="HELLO WORLD!"
echo ${STR,}   # => hELLO WORLD!
echo ${STR,,}  # => hello world!

STR="hello world!"
echo ${STR^}   # => Hello world!
echo ${STR^^}  # => HELLO WORLD!

ARR=(hello World)
echo "${ARR[@],}" # => hello world
echo "${ARR[@]^}" # => Hello World
```

## [#](https://quickref.me/bash#bash-arrays)Bash Arrays

### [#](https://quickref.me/bash#defining-arrays)Defining arrays

```
Fruits=('Apple' 'Banana' 'Orange')

Fruits[0]="Apple"
Fruits[1]="Banana"
Fruits[2]="Orange"

ARRAY1=(foo{1..2}) # => foo1 foo2
ARRAY2=({A..D})    # => A B C D

# Merge => foo1 foo2 A B C D
ARRAY3=(${ARRAY1[@]} ${ARRAY2[@]})

# declare construct
declare -a Numbers=(1 2 3)
Numbers+=(4 5) # Append => 1 2 3 4 5
```

### [#](https://quickref.me/bash#indexing)Indexing

| \- | \- |
| --- | --- |
| `${Fruits[0]}` | First element |
| `${Fruits[-1]}` | Last element |
| `${Fruits[*]}` | All elements |
| `${Fruits[@]}` | All elements |
| `${#Fruits[@]}` | Number of all |
| `${#Fruits}` | Length of 1st |
| `${#Fruits[3]}` | Length of nth |
| `${Fruits[@]:3:2}` | Range |
| `${!Fruits[@]}` | Keys of all |

### [#](https://quickref.me/bash#iteration)Iteration

```
Fruits=('Apple' 'Banana' 'Orange')

for e in "${Fruits[@]}"; do
    echo $e
done
```

#### [#](https://quickref.me/bash#with-index)With index

```
for i in "${!Fruits[@]}"; do
  printf "%s\t%s\n" "$i" "${Fruits[$i]}"
done

```

### [#](https://quickref.me/bash#operations)Operations

```
Fruits=("${Fruits[@]}" "Watermelon")     # Push
Fruits+=('Watermelon')                   # Also Push
Fruits=( ${Fruits[@]/Ap*/} )             # Remove by regex match
unset Fruits[2]                          # Remove one item
Fruits=("${Fruits[@]}")                  # Duplicate
Fruits=("${Fruits[@]}" "${Veggies[@]}")  # Concatenate
lines=(`cat "logfile"`)                  # Read from file
```

### [#](https://quickref.me/bash#arrays-as-arguments)Arrays as arguments

```
function extract()
{
    local -n myarray=$1
    local idx=$2
    echo "${myarray[$idx]}"
}
Fruits=('Apple' 'Banana' 'Orange')
extract Fruits 2     # => Orangle
```

## [#](https://quickref.me/bash#bash-dictionaries)Bash Dictionaries

### [#](https://quickref.me/bash#defining)Defining

```
declare -A sounds
```

```
sounds[dog]="bark"
sounds[cow]="moo"
sounds[bird]="tweet"
sounds[wolf]="howl"
```

### [#](https://quickref.me/bash#working-with-dictionaries)Working with dictionaries

```
echo ${sounds[dog]} # Dog's sound
echo ${sounds[@]}   # All values
echo ${!sounds[@]}  # All keys
echo ${#sounds[@]}  # Number of elements
unset sounds[dog]   # Delete dog
```

### [#](https://quickref.me/bash#iteration-2)Iteration

```
for val in "${sounds[@]}"; do
    echo $val
done
```

___

```
for key in "${!sounds[@]}"; do
    echo $key
done
```

## [#](https://quickref.me/bash#bash-conditionals)Bash Conditionals

### [#](https://quickref.me/bash#integer-conditions)Integer conditions

| Condition | Description |
| --- | --- |
| `[[ NUM -eq NUM ]]` | Equal |
| `[[ NUM -ne NUM ]]` | Not equal |
| `[[ NUM -lt NUM ]]` | Less than |
| `[[ NUM -le NUM ]]` | Less than or equal |
| `[[ NUM -gt NUM ]]` | Greater than |
| `[[ NUM -ge NUM ]]` | Greater than or equal |
| `(( NUM < NUM ))` | Less than |
| `(( NUM <= NUM ))` | Less than or equal |
| `(( NUM > NUM ))` | Greater than |
| `(( NUM >= NUM ))` | Greater than or equal |

### [#](https://quickref.me/bash#string-conditions)String conditions

| Condition | Description |
| --- | --- |
| `[[ -z STR ]]` | Empty string |
| `[[ -n STR ]]` | Not empty string |
| `[[ STR == STR ]]` | Equal |
| `[[ STR = STR ]]` | Equal (Same above) |
| `[[ STR < STR ]]` | Less than _(ASCII)_ |
| `[[ STR > STR ]]` | Greater than _(ASCII)_ |
| `[[ STR != STR ]]` | Not Equal |
| `[[ STR =~ STR ]]` | Regexp |

### [#](https://quickref.me/bash#example)Example

#### [#](https://quickref.me/bash#string)String

```
if [[ -z "$string" ]]; then
    echo "String is empty"
elif [[ -n "$string" ]]; then
    echo "String is not empty"
else
    echo "This never happens"
fi
```

#### [#](https://quickref.me/bash#combinations)Combinations

```
if [[ X && Y ]]; then
    ...
fi
```

#### [#](https://quickref.me/bash#equal)Equal

```
if [[ "$A" == "$B" ]]; then
    ...
fi
```

#### [#](https://quickref.me/bash#regex)Regex

```
if [[ '1. abc' =~ ([a-z]+) ]]; then
    echo ${BASH_REMATCH[1]}
fi
```

#### [#](https://quickref.me/bash#smaller)Smaller

```
if (( $a < $b )); then
   echo "$a is smaller than $b"
fi
```

#### [#](https://quickref.me/bash#exists)Exists

```
if [[ -e "file.txt" ]]; then
    echo "file exists"
fi
```

### [#](https://quickref.me/bash#file-conditions)File conditions

| Condition | Description |
| --- | --- |
| `[[ -e FILE ]]` | Exists |
| `[[ -d FILE ]]` | Directory |
| `[[ -f FILE ]]` | File |
| `[[ -h FILE ]]` | Symlink |
| `[[ -s FILE ]]` | Size is > 0 bytes |
| `[[ -r FILE ]]` | Readable |
| `[[ -w FILE ]]` | Writable |
| `[[ -x FILE ]]` | Executable |
| `[[ f1 -nt f2 ]]` | f1 newer than f2 |
| `[[ f1 -ot f2 ]]` | f2 older than f1 |
| `[[ f1 -ef f2 ]]` | Same files |

### [#](https://quickref.me/bash#more-conditions)More conditions

| Condition | Description |
| --- | --- |
| `[[ -o noclobber ]]` | If OPTION is enabled |
| `[[ ! EXPR ]]` | Not |
| `[[ X && Y ]]` | And |
| `[[ X || Y ]]` | Or |

### [#](https://quickref.me/bash#logical-and-or)logical and, or

```
if [ "$1" = 'y' -a $2 -gt 0 ]; then
    echo "yes"
fi

if [ "$1" = 'n' -o $2 -lt 0 ]; then
    echo "no"
fi
```

## [#](https://quickref.me/bash#bash-loops)Bash Loops

### [#](https://quickref.me/bash#basic-for-loop)Basic for loop

```
for i in /etc/rc.*; do
    echo $i
done
```

### [#](https://quickref.me/bash#c-like-for-loop)C-like for loop

```
for ((i = 0 ; i < 100 ; i++)); do
    echo $i
done
```

### [#](https://quickref.me/bash#ranges)Ranges

```
for i in {1..5}; do
    echo "Welcome $i"
done
```

#### [#](https://quickref.me/bash#with-step-size)With step size

```
for i in {5..50..5}; do
    echo "Welcome $i"
done
```

### [#](https://quickref.me/bash#auto-increment)Auto increment

```
i=1
while [[ $i -lt 4 ]]; do
    echo "Number: $i"
    ((i++))
done
```

### [#](https://quickref.me/bash#auto-decrement)Auto decrement

```
i=3
while [[ $i -gt 0 ]]; do
    echo "Number: $i"
    ((i--))
done
```

### [#](https://quickref.me/bash#continue)Continue

```
for number in $(seq 1 3); do
    if [[ $number == 2 ]]; then
        continue;
    fi
    echo "$number"
done
```

### [#](https://quickref.me/bash#break)Break

```
for number in $(seq 1 3); do
    if [[ $number == 2 ]]; then
        # Skip entire rest of loop.
        break;
    fi
    # This will only print 1
    echo "$number"
done
```

### [#](https://quickref.me/bash#until)Until

```
count=0
until [ $count -gt 10 ]; do
    echo "$count"
    ((count++))
done
```

### [#](https://quickref.me/bash#forever)Forever

```
while true; do
    # here is some code.
done
```

### [#](https://quickref.me/bash#forever-shorthand)Forever (shorthand)

```
while :; do
    # here is some code.
done
```

### [#](https://quickref.me/bash#reading-lines)Reading lines

```
cat file.txt | while read line; do
    echo $line
done
```

## [#](https://quickref.me/bash#bash-functions)Bash Functions

### [#](https://quickref.me/bash#defining-functions)Defining functions

```
myfunc() {
    echo "hello $1"
}
```

```
# Same as above (alternate syntax)
function myfunc() {
    echo "hello $1"
}
```

```
myfunc "John"
```

### [#](https://quickref.me/bash#returning-values)Returning values

```
myfunc() {
    local myresult='some value'
    echo $myresult
}
```

```
result="$(myfunc)"
```

### [#](https://quickref.me/bash#raising-errors)Raising errors

```
myfunc() {
    return 1
}
```

```
if myfunc; then
    echo "success"
else
    echo "failure"
fi
```

## [#](https://quickref.me/bash#bash-options)Bash Options

### [#](https://quickref.me/bash#options)Options

```
# Avoid overlay files
# (echo "hi" > foo)
set -o noclobber

# Used to exit upon error
# avoiding cascading errors
set -o errexit   

# Unveils hidden failures
set -o pipefail  

# Exposes unset variables
set -o nounset
```

### [#](https://quickref.me/bash#glob-options)Glob options

```
# Non-matching globs are removed  
# ('*.foo' => '')
shopt -s nullglob   

# Non-matching globs throw errors
shopt -s failglob  

# Case insensitive globs
shopt -s nocaseglob

# Wildcards match dotfiles
# ("*.sh" => ".foo.sh")
shopt -s dotglob    

# Allow ** for recursive matches
# ('lib/**/*.rb' => 'lib/a/b/c.rb')
shopt -s globstar   
```

## [#](https://quickref.me/bash#bash-history)Bash History

### [#](https://quickref.me/bash#commands)Commands

| Command | Description |
| --- | --- |
| `history` | Show history |
| `sudo !!` | Run the previous command with sudo |
| `shopt -s histverify` | Don't execute expanded result immediately |

### [#](https://quickref.me/bash#expansions)Expansions

| Expression | Description |
| --- | --- |
| `!$` | Expand last parameter of most recent command |
| `!*` | Expand all parameters of most recent command |
| `!-n` | Expand `n`th most recent command |
| `!n` | Expand `n`th command in history |
| `!<command>` | Expand most recent invocation of command `<command>` |

### [#](https://quickref.me/bash#operations-2)Operations

| Code | Description |
| --- | --- |
| `!!` | Execute last command again |
| `!!:s/<FROM>/<TO>/` | Replace first occurrence of `<FROM>` to `<TO>` in most recent command |
| `!!:gs/<FROM>/<TO>/` | Replace all occurrences of `<FROM>` to `<TO>` in most recent command |
| `!$:t` | Expand only basename from last parameter of most recent command |
| `!$:h` | Expand only directory from last parameter of most recent command |

`!!` and `!$` can be replaced with any valid expansion.

### [#](https://quickref.me/bash#slices)Slices

| Code | Description |
| --- | --- |
| `!!:n` | Expand only `n`th token from most recent command (command is `0`; first argument is `1`) |
| `!^` | Expand first argument from most recent command |
| `!$` | Expand last token from most recent command |
| `!!:n-m` | Expand range of tokens from most recent command |
| `!!:n-$` | Expand `n`th token to last from most recent command |

`!!` can be replaced with any valid expansion i.e. `!cat`, `!-2`, `!42`, etc.

## [#](https://quickref.me/bash#miscellaneous)Miscellaneous

### [#](https://quickref.me/bash#numeric-calculations)Numeric calculations

```
$((a + 200))      # Add 200 to $a
```

```
$(($RANDOM%200))  # Random number 0..199
```

### [#](https://quickref.me/bash#subshells)Subshells

```
(cd somedir; echo "I'm now in $PWD")
pwd # still in first directory
```

### [#](https://quickref.me/bash#inspecting-commands)Inspecting commands

```
command -V cd
#=> "cd is a function/alias/whatever"
```

### [#](https://quickref.me/bash#redirection)Redirection

```
python hello.py > output.txt   # stdout to (file)
python hello.py >> output.txt  # stdout to (file), append
python hello.py 2> error.log   # stderr to (file)
python hello.py 2>&1           # stderr to stdout
python hello.py 2>/dev/null    # stderr to (null)
python hello.py &>/dev/null    # stdout and stderr to (null)
```

```
python hello.py < foo.txt      # feed foo.txt to stdin for python
```

### [#](https://quickref.me/bash#source-relative)Source relative

```
source "${0%/*}/../share/foo.sh"
```

### [#](https://quickref.me/bash#directory-of-script)Directory of script

### [#](https://quickref.me/bash#case-switch)Case/switch

```
case "$1" in
    start | up)
    vagrant up
    ;;

    *)
    echo "Usage: $0 {start|stop|ssh}"
    ;;
esac
```

### [#](https://quickref.me/bash#trap-errors)Trap errors

```
trap 'echo Error at about $LINENO' ERR
```

or

```
traperr() {
    echo "ERROR: ${BASH_SOURCE[1]} at about ${BASH_LINENO[0]}"
}

set -o errtrace
trap traperr ERR
```

### [#](https://quickref.me/bash#printf)printf

```
printf "Hello %s, I'm %s" Sven Olga
#=> "Hello Sven, I'm Olga

printf "1 + 1 = %d" 2
#=> "1 + 1 = 2"

printf "Print a float: %f" 2
#=> "Print a float: 2.000000"
```

### [#](https://quickref.me/bash#getting-options)Getting options

```
while [[ "$1" =~ ^- && ! "$1" == "--" ]]; do case $1 in
    -V | --version )
    echo $version
    exit
    ;;
    -s | --string )
    shift; string=$1
    ;;
    -f | --flag )
    flag=1
    ;;
esac; shift; done
if [[ "$1" == '--' ]]; then shift; fi
```

### [#](https://quickref.me/bash#check-for-command-s-result)Check for command's result

```
if ping -c 1 google.com; then
    echo "It appears you have a working internet connection"
fi
```

### [#](https://quickref.me/bash#special-variables)Special variables

| Expression | Description |
| --- | --- |
| `$?` | Exit status of last task |
| `$!` | PID of last background task |
| `$$` | PID of shell |
| `$0` | Filename of the shell script |

See [Special parameters](http://wiki.bash-hackers.org/syntax/shellvars#special_parameters_and_shell_variables).

### [#](https://quickref.me/bash#grep-check)Grep check

```
if grep -q 'foo' ~/.bash_history; then
    echo "You appear to have typed 'foo' in the past"
fi
```

### [#](https://quickref.me/bash#backslash-escapes)Backslash escapes

-   !
-   "
-   #
-   &
-   '
-   (
-   )
-   ,
-   ;
-   <
-   \>
-   \[
-   |
-   \\
-   \]
-   ^
-   {
-   }
-   \`
-   $
-   \*
-   ?

Escape these special characters with `\`

### [#](https://quickref.me/bash#heredoc)Heredoc

```
cat <<END
hello world
END
```

### [#](https://quickref.me/bash#go-to-previous-directory)Go to previous directory

```
pwd # /home/user/foo
cd bar/
pwd # /home/user/foo/bar
cd -
pwd # /home/user/foo
```

### [#](https://quickref.me/bash#reading-input)Reading input

```
echo -n "Proceed? [y/n]: "
read ans
echo $ans
```

```
read -n 1 ans    # Just one character
```

### [#](https://quickref.me/bash#conditional-execution)Conditional execution

```
git commit && git push
git commit || echo "Commit failed"
```

### [#](https://quickref.me/bash#strict-mode)Strict mode

### [#](https://quickref.me/bash#optional-arguments)Optional arguments

```
args=("$@")
args+=(foo)
args+=(bar)
echo "${args[@]}"
```

Put the arguments into an array and then append

## [#](https://quickref.me/bash#also-see)Also see

-   [Devhints](https://devhints.io/bash) _(devhints.io)_
-   [Bash-hackers wiki](http://wiki.bash-hackers.org/) _(bash-hackers.org)_
-   [Shell vars](http://wiki.bash-hackers.org/syntax/shellvars) _(bash-hackers.org)_
-   [Learn bash in y minutes](https://learnxinyminutes.com/docs/bash/) _(learnxinyminutes.com)_
-   [Bash Guide](http://mywiki.wooledge.org/BashGuide) _(mywiki.wooledge.org)_
-   [ShellCheck](https://www.shellcheck.net/) _(shellcheck.net)_
-   [shell - Standard Shell](https://devmanual.gentoo.org/tools-reference/bash/index.html) _(devmanual.gentoo.org)_

© 2023 QuickRef.ME, All rights reserved.
