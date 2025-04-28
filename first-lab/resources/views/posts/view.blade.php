<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body>
       


    <article
        class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg dark:shadow-gray-700/25 w-75 mx-auto my-5"
                >
       

        <div class="bg-white p-4 sm:p-6 dark:bg-gray-900">
            <time datetime="2022-10-10" class="block text-xs text-gray-500 dark:text-gray-400">
            10th Oct 2022
            </time>

            
            <h3 class="mt-0.5 text-lg text-gray-900 dark:text-white">
                        {{$post['title']}}
            </h3>
            <h3 class="mt-0.5 text-lg text-gray-900 dark:text-white">
            {{$post['body']}}
            </h3>
            <h3 class="mt-0.5 text-lg text-gray-900 dark:text-white">
            {{$post['created_by']}}
            </h3>
            

            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500 dark:text-gray-400">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus
            pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem,
            mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque
            dignissimos. Molestias explicabo corporis voluptatem?
            </p>
        </div>
    </article>

    </body>
</html>
