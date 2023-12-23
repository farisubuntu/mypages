put all json data inside public

then import required json file with:

```jsx
useEffect(() => {
  const getData = async () => {
    fetch("/mappingSrc.js")
      .then((response) => response.json())
      .then((response) => {
        dispatch(setRaw(response));
        setGame(false);
        dispatch(newGame());
      })
      .catch((err) => console.error(err));
  };
  getData();
}, []);
```

