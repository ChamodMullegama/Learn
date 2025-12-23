import React, { useEffect, useState } from 'react'

const Post = () => {

const [posts, setPosts] = useState([])

useEffect(() => {
    console.log("Post component mounted")

    fetch("https://jsonplaceholder.typicode.com/posts").then(res => {
        if(!res.ok) throw new Error("Network response was not ok")
        return res.json()
    }).then(data=>setPosts(data))
}, [])

  return (
    <div>
        {posts.length >0 ? (
          <>
            {posts.map((post) => {
              return (
                <table key={post.id}>
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Body</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{post.title}</td>
                      <td>{post.body}</td>
                    </tr>
                  </tbody>
                </table>
              )
            })}
          </>
        ) : (
            <p>no post</p>
        )}
        
    </div>
  )
}

export default Post