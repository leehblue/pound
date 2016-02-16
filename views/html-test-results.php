<div id="lb-tests">
    <h3 class="test-title"><?php echo $title ?></h3>

    <?php if ( count( $results->passed_messages ) ): ?>
    <div class="tests passed-tests">
        <h4 class="passed">Passed Tests</h4>
        <ul class="passed">
            <?php foreach( $results->passed_messages as $msg ): ?>
            <li><?php echo $msg; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if ( count( $results->failed_messages ) ): ?>
    <div class="tests failed-tests">
        <h4 class="failed">Failed Tests</h4>
        <ul class="failed">
            <?php foreach( $results->failed_messages as $msg ): ?>
            <li><?php echo nl2br( $msg ); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if ( count( $results->skipped_messages ) ): ?>
    <div class="tests skipped-tests">
        <h4 class="skipped">Skipped Tests</h4>
        <ul class="skipped">
            <?php foreach( $results->skipped_messages as $msg ): ?>
            <li><?php echo $msg; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="tests test-summary">
        <h4>Summary</h4>
        <ul>
            <li>Passed: <?php echo count( $results->passed_messages ); ?></li>
            <li>Failed: <?php echo count( $results->failed_messages ); ?></li>
            <li>Skipped: <?php echo count( $results->skipped_messages ); ?></li>
        </ul>
    </div>
</div>
