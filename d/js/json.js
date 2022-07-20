fetch('https://just--test.vercel.app/d/backend/json.php').then(function (a) {
    return a.json()
}).then(function (a) {
    document.getElementById("json").innerHTML = a.time
}).catch(err => console.log('Request Failed', err))