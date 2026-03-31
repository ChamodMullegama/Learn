import React from 'react'
import { NavLink } from 'react-router'


const SidBar = () => {
  return (
    <aside className='w-64 h-screen bg-gray-800 text-white p-4'>
      <h2 className='text-2xl font-bold mb-6'>Admin Dashboard</h2>
      <nav className='space-y-4'>
        <NavLink to="/dashboard" className={({isActive}) => isActive ? 'block py-2 px-4 rounded bg-gray-700' : 'block py-2 px-4 rounded hover:bg-gray-700'}>
          Dashboard
        </NavLink>
        <NavLink to="/dashboard/users" className={({isActive}) => isActive ? 'block py-2 px-4 rounded bg-gray-700' : 'block py-2 px-4 rounded hover:bg-gray-700'}>
          User
        </NavLink>
      </nav>
    </aside>
  )
}

export default SidBar