<?php

/**
* For creating markup that does not fit into the exiting options.
*
* This extends SWP_Option rather than _Section because it uses
* many of the same methods as an option and is a child of a
* section, even though this is not necessarily an option.
*
* @since 3.0.0
*/

class SWP_Section_HTML extends SWP_Option {
    public function __construct( $name ) {
        //* This does not have a key, so pass an empty string
        //* as the second arg.
        parent::__construct( $name, $name );
    }

    /**
    * Allows custom HTML to be added.
    *
    * @param string $html The fully qualified, ready-to-print HTML to display.
    * @return SWP_Section_HTML $this This object for method chaining.
    */
    public function add_HTML( $html ) {
        if ( !is_string( $html) ) :
            $this->_throw( 'This requires a string of HTML!' );
        endif;

        $this->html .= $html;

        return $this;
    }

    /**
    * The rendering method common to all classes.
    *
    * @return This object's saved HTML.
    */
    public function render_html() {
        return $this->html;
    }

    /**
    * The buttons preview as shown on the Display tab.
    *
    * @return SWP_Section_HTML $this This object for method chaining.
    */
    public function do_buttons_preview() {
        ob_start() ?>

        <div class="nc_socialPanel swp_flatFresh swp_d_fullColor swp_i_fullColor swp_o_fullColor" data-position="both" data-float="floatNone" data-count="6" data-floatColor="#ffffff" data-scale="1" data-align="fullWidth">
            <div class="nc_tweetContainer googlePlus" data-id="2">
                <a target="_blank" href="https://plus.google.com/share?url=http%3A%2F%2Fwfa.re%2F1W28voz" data-link="https://plus.google.com/share?url=http%3A%2F%2Fwfa.re%2F1W28voz" class="nc_tweet">
                    <span class="iconFiller">
                        <span class="spaceManWilly">
                            <i class="sw sw-google-plus"></i>
                            <span class="swp_share"><?php __( '+1','social-warfare' ) ?></span>
                        </span>
                    </span>
                    <span class="swp_count">1.2K</span>
                </a>
            </div>
            <div class="nc_tweetContainer twitter" data-id="3">
                <a href="https://twitter.com/share?original_referer=/&text=Ultimate+Social+Share+%23WordPress+plugin%21+Beautiful%2C+super+fast+%26+more+http%3A%2F%2Fwarfareplugins.com+pic.twitter.com%2FA2zcCJwZtO&url=/&via=WarfarePlugins" data-link="https://twitter.com/share?original_referer=/&text=Ultimate+Social+Share+%23WordPress+plugin%21+Beautiful%2C+super+fast+%26+more+http%3A%2F%2Fwarfareplugins.com+pic.twitter.com%2FA2zcCJwZtO&url=/&via=WarfarePlugins" class="nc_tweet">
                    <span class="iconFiller">
                        <span class="spaceManWilly">
                            <i class="sw sw-twitter"></i>
                            <span class="swp_share"><?php __( 'Tweet','social-warfare' ) ?></span>
                        </span>
                    </span>
                    <span class="swp_count">280</span>
                </a>
            </div>
            <div class="nc_tweetContainer nc_pinterest" data-id="6">
                <a data-link="https://pinterest.com/pin/create/button/?url=https://warfareplugins.com/&media=https%3A%2F%2Fwarfareplugins.com%2Fwp-content%2Fuploads%2Fget-content-shared-735x1102.jpg&description=Customize+your+Pinterest+sharing+options%2C+create+easy+%22click+to+tweet%22+buttons+within+your+blog+posts%2C+beautiful+sharing+buttons+and+more.+Social+Warfare+is+the+ultimate+social+sharing+arsenal+for+WordPress%21" class="nc_tweet" data-count="0">
                    <span class="iconFiller">
                        <span class="spaceManWilly">
                            <i class="sw sw-pinterest"></i>
                            <span class="swp_share"><?php __( 'Pin','social-warfare' ) ?>'</span>
                        </span>
                    </span>
                    <span class="swp_count">104</span>
                </a>
            </div>
            <div class="nc_tweetContainer swp_fb" data-id="4">
                <a target="_blank" href="http://www.facebook.com/share.php?u=http%3A%2F%2Fwfa.re%2F1W28vov" data-link="http://www.facebook.com/share.php?u=http%3A%2F%2Fwfa.re%2F1W28vov" class="nc_tweet">
                    <span class="iconFiller">
                        <span class="spaceManWilly">
                            <i class="sw sw-facebook"></i>
                            <span class="swp_share"><?php __( 'Share','social-warfare' ) ?></span>
                        </span>
                    </span>
                    <span class="swp_count">157</span>
                </a>
            </div>
            <div class="nc_tweetContainer linkedIn" data-id="5">
                <a target="_blank" href="https://www.linkedin.com/cws/share?url=http%3A%2F%2Fwfa.re%2F1W28twH" data-link="https://www.linkedin.com/cws/share?url=http%3A%2F%2Fwfa.re%2F1W28twH" class="nc_tweet">
                    <span class="iconFiller">
                        <span class="spaceManWilly">
                            <i class="sw sw-linkedin"></i>
                            <span class="swp_share"><?php __( 'Share','social-warfare' ) ?></span>
                        </span>
                    </span>
                    <span class="swp_count">51</span>
                </a>
            </div>
            <div class="nc_tweetContainer totes totesalt" data-id="6" >
            <span class="swp_count">
                <span class="swp_label">Shares</span> 1.8K
            </span>
            </div>
        </div>

        <?php

        $this->html = ob_end_clean();

        return $this;
    }

    /**
    * The Active buttons UI in the Display tab.
    *
    * @param array $icons The array of currently selected icons.
    * @return SWP_Section_HTML $this This object for method chaining.
    */
    public function do_active_buttons( $icons ) {
        $html = '<div class="sw-grid sw-col-300">';
            $html .= '<h3 class="sw-buttons-toggle">' . __( 'Active' , 'social-warfare' ) . '</h3>';
        $html .= '</div>';

        $html .= '<div class="sw-grid sw-col-620 sw-fit">';
            $html .= '<div class="sw-active sw-buttons-sort">';

            foreach ( $icons['content'] as $network => $data ) {
                $html .= '<i class="sw sw-' . $network . '-icon';
                $html .= ' data-network="' . $network . '"';

                if ( $data['premium'] === 'premium' ) :
                    $html .= ' premium="true"';
                endif;

                $html .= ' tabindex="0" role="button" aria-label="' . $network . '">';
                $html .= '</i>';
            }

            $html .= '</div>';
        $html .= '</div>';

        $this->html = $html;

        return $this;
    }

    /**
    * The Inactive buttons UI in the Display tab.
    *
    * @param array $icons The array of currently selected icons.
    * @return SWP_Section_HTML $this This object for method chaining.
    * //* TODO: finish this method.
    */
    public function do_inactive_buttons() {
        $html = '<div class="sw-grid sw-col-300">';
            $html .=  '<h3 class="sw-buttons-toggle">' . __( 'Inactive' , 'social-warfare' ) . '</h3>';
        $html .=  '</div>';

        $html .=  '<div class="sw-grid sw-col-620 sw-fit">';
            $html .=  '<div class="sw-inactive sw-buttons-sort">';

            //* wut

            $html .= '</div>';
        $html .= '</div>';
    }

}

