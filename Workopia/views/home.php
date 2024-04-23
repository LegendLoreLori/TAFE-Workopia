<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('showcase-search');
loadPartial('top-banner');
/** @var array $listings */
?>

<!-- Job Listings -->
<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
            Recent Jobs
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!--$listings linted as undefined, chatGPT recommended using
            docstrings to define a $listings name.
            Personally I am unsure if this a code smell or not, but I don't
            know enough about dynamically generating web pages to have any
            authoritative opinion.
            Conversation:
            https://chat.openai.com/share/d6c91b99-e4f1-4fac-a6d8-f6082f8603ca-->
            <?php foreach ($listings as $listing) : ?>
                <!-- Job Listing 1: Software Engineer -->
                <div class="rounded-lg shadow-md bg-white">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold"><?= $listing->title ?></h2>
                        <p class="text-gray-700 text-lg mt-2">
                            We are seeking a skilled software engineer to
                            develop
                            high-quality software solutions.
                        </p>
                        <ul class="my-4 bg-gray-100 p-4 rounded">
                            <li class="mb-2">
                                <strong>Salary:</strong> <?= formatSalary($listing->salary) ?>
                            </li>
                            <li class="mb-2">
                                <strong>Location:</strong> <?= $listing->city ?>,
                                <?= $listing->state ?>
<!--                                <span-->
<!--                                        class="text-xs bg-blue-500 text-white-->
<!--                                     rounded-full px-2 py-1 ml-2">Local</span>-->
                            </li>
                            <li class="mb-2">
                                <strong>Tags:</strong> <?= $listing->tags ?>,
                                <span>Coding</span>
                            </li>
                        </ul>
                        <a href="/listing/<?= $listing->id ?>"
                           class="block w-full text-center px-5 py-2.5 shadow-sm
                        rounded border text-base font-medium text-indigo-700
                         bg-indigo-100 hover:bg-indigo-200">
                            Details
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="/listings" class="block text-xl text-center">
            <i class="fa fa-arrow-alt-circle-right"></i>
            Show All Jobs
        </a>
</section>

<?php
loadPartial('bottom-banner');
loadPartial('footer');
?>

