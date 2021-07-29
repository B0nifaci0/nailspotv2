fetch('/notifications')
      .then(response => response.json())
      .then(json => console.log(json))
