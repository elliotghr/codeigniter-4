<nav class="pagination" aria-label="<?= lang('Pager.pageNavigation') ?>">
    <?php if ($pager->hasPreviousPage()) : ?>
        <a class="pagination-previous" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
            <span aria-hidden="true">Anterior</span>
        </a>
    <?php endif ?>
    <?php if ($pager->hasNextPage()) : ?>
        <a class="pagination-next" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
            <span aria-hidden="true">Siguiente</span>
        </a>
    <?php endif ?>

    <ul class="pagination-list">
        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a class="pagination-link <?= $link['active'] ? 'is-current' : '' ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>