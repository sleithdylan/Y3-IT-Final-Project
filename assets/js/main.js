// var con = 0;
// var div = document.getElementById('cardDiv');

// function getPost() {
//   fetch('https://jsonplaceholder.typicode.com/posts')
//     .then(response => {
//       return response.json();
//     })
//     .then(post => {
//       for (var index = 0; index < 2; index++) {
//         div.innerHTML += '<h5>' + post[con].id + '</h5>';
//         div.innerHTML += '<h6>' + post[con].title + '</h6>';
//         div.innerHTML += '<p>' + post[con].body + '</p>';

//         con = con + 1;
//       }
//     })
//     .catch(error => {
//       console.log(error);
//     });
// }

// getPost();
