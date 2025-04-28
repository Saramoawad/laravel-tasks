

<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body>
    <a href="/posts/create"    class="group inline-block rounded-sm bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:ring-3 focus:outline-hidden "
                        >  <span class="block rounded-xs bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent ">
                        Add Post</span></a>


        <table class=" divide-y-2 divide-gray-200 dark:divide-gray-700 w-100 mx-auto my-5">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">ID</th>
                    <th class="px-3 py-2 whitespace-nowrap">Title</th>
                    <th class="px-3 py-2 whitespace-nowrap">Body</th>
                    <th class="px-3 py-2 whitespace-nowrap">Created By</th>
                    <th class="px-3 py-2 whitespace-nowrap">Action</th>
                    
                </tr>
            </thead>
            <tbody   class="divide-y divide-gray-200 *:even:bg-gray-50 dark:divide-gray-700 dark:*:even:bg-gray-800"
            >
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post['id']}}</td>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['body']}}</td>
                        <td>{{$post['created_by']}}</td>
                        <td><a href="/posts/{{$post['id']}}"    class="inline-block rounded-sm border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:ring-3 focus:outline-hidden"
                        >View</a></td>
                        <td><a href="/posts/{{$post['id']}}/edit"    class="group inline-block rounded-sm bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:ring-3 focus:outline-hidden"
                        >  <span class="block rounded-xs bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent">
                        Edit</span></a></td>

                            <td>
                                    <a
                                    class="group relative inline-block text-sm font-medium text-white focus:ring-3 focus:outline-hidden"
                                    href="/posts/{{$post['id']}}/delete"
                                    >
                                        <span class="absolute inset-0 border border-red-600"></span>
                                        <span
                                            class="block border border-red-600 bg-red-600 px-12 py-3 transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1"
                                        >
                                        Delete
                                        </span>
                                    </a>
                            </td>




                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
