import React from "react";
import { useState, useEffect } from "react";

const Post = () => {

  const [posts, setPosts] = useState([]);
    const [query, setQuery] = useState("");

  useEffect(() => {
    fetch(`https://jsonplaceholder.typicode.com/posts?q=${query}`)
      .then((res) => {
        if (!res.ok) throw new Error("Network response was not ok");
        return res.json();
      })
      .then((data) => setPosts(data))
      .catch((err) => console.error("Error:", err));
  }, [query]);


  useEffect(() => {
    setInterval(()=>{

    },1000)
  })

  const searchQuery = (e)=>{

    setQuery(e.target.value);

  }

  return (
    <div>
      <h2>Posts</h2>
      <input type="text" placeholder="search post"  onChange={searchQuery}/>
      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
          </tr>
        </thead>

        <tbody>
          {posts.length > 0 ? (
            posts.map((post) => (
              <tr key={post.id}>
                <td>{post.id}</td>
                <td>{post.title}</td>
                 <td>{post.body}</td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan="2">No post found</td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
};

export default Post;