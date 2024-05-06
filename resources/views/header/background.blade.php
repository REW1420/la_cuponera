<style>
    .background {
        position: fixed;
        top: -50vmin;
        left: -50vmin;
        width: 100vmin;
        height: 100vmin;
        border-radius: 47% 53% 61% 39% / 45% 51% 49% 55%;
        background: #65c8ff;
        z-index: -1;
    }

    .background::after {
        content: "";
        position: inherit;
        right: -50vmin;
        bottom: -55vmin;
        width: inherit;
        height: inherit;
        border-radius: inherit;
        background: #143d81;
    }
</style>
<div class="background"></div>
