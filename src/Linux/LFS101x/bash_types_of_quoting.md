## Types of quoting

There are three standard types of quotes (or four if you count backslash escaping), and two nonstandard Bash extensions.

- Single quotes: '...' removes the special meaning of every character between the quotes. Everything inside single quotes becomes a literal string. The only character that you can't safely enclose in single quotes is a single quote.

- Double quotes: "..." prevents some substitutions but allows others. Every substitution that begins with a dollar sign $ is performed, as is the legacy `...` (backtick) command substitution. Backslash escaping is also performed. No word splitting or filename expansion is performed.

- Backticks: `...` is the legacy command substitution syntax; deprecated in favor of $(...) but still permitted for historical reasons. See FAQ 082 for details.

- Backslash: Putting \ in front of a metacharacter removes its special meaning. This works inside double quotes, or in the absence of quotes. It does not work inside single quotes.

- $'...' : Contents are a single word with interpretation of backslash escape sequences such as \n for newline, \t for tab, and \xnn for bytes specified in hexadecimal. These may be used to specify a text representation of arbitrary data. No current implementation supports a context where these are not interpreted as NUL-terminated C strings.

- $"..." : This is a Bash extension. It is used for localization support and will not be covered on this page.

---

## Effect of Quoting:

**Preserve unescaped metacharacters**

```bash
echo '&' # '' not passed to the command nor echo sees it.
```
**Prevent `field/word splitting` and ignore `glob` pattern characters**



**Expand argument lists**
