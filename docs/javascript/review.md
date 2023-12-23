# What is the difference between Element and Component?

src: (https://dev.to)

---

<ul dir="rtl">

- **\_**كائن عادي يصف ما تريد ان تعرضه على الشاشة بمصطلحات ال DOM nodes أو مكونات أخرى

---

في العبارة التالية حدد ماذا تمثل والقيمة المعادة والنتيجة كا html

````js
const element = React.createElement('div', { id: 'login-btn' }, 'Login');```
````

---


- A component can be declared in several different ways. It can be a '**\_' with a `render()` method. Alternatively, in simple cases, it can be defined as a `function`. In either case, it takes '\_\_\_**' as an input, and returns a '\_\_\_' tree as the output:

```js
const Button = ({ onLogin }) =>
    (
     <div  id={"login-btn"}
      onClick={onLogin}> Login
     </div>
      );
```




---











</ul>

<style>
li,p{
 direction:rtl;
}
ul.rtl * {
 direction:rtl
}

</style>
