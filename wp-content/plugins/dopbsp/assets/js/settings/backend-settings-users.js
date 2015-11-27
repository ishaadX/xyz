
/*
* Title                   : Pinpoint Booking System WordPress Plugin (PRO)
* Version                 : 2.1.1
* File                    : assets/js/settings/backend-settings-users.js
* File Version            : 1.0.3
* Created / Last Modified : 25 August 2015
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Back end users settings JavaScript class.
*/

var DOPBSPSettingsUsers = new function(){
    'use strict';
    
    /*
     * Private variables
     */
    var $ = jQuery.noConflict();

    /*
     * Public variables
     */
    this.ajaxRequestInProgress;
    this.ajaxRequestTimeout;

    /*
     * Constructor
     */
    this.__construct = function(){
    };
    
    /*
     * Display users settings.
     * 
     * @param id (Number): calendar ID
     */
    this.display = function(id){
        DOPBSP.toggleMessages('active', DOPBSP.text('MESSAGES_LOADING'));
        DOPBSPSettings.toggle(id, 'users');

        $.post(ajaxurl, {action: 'dopbsp_settings_users_display',
                         calendar_id: id}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_LOADING_SUCCESS'));
            $('#DOPBSP-column2 .dopbsp-column-content').html(data);
            DOPBSPSettingsUsers.get(id);
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };

    /*
     * Get users list by search parameters.
     * 
     * @param id (Number): calendar ID
     */
    this.get = function(id){
        DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_LOADING'));

        if (this.ajaxRequestInProgress !== undefined){
            this.ajaxRequestInProgress.abort();
        }
        
        this.ajaxRequestTimeout = setTimeout(function(){
            clearTimeout(this.ajaxRequestTimeout);

            this.ajaxRequestInProgress = $.post(ajaxurl, {action: 'dopbsp_settings_users_get',
                                                          calendar_id: id,
                                                          number: '',
                                                          offset : '',
                                                          order: $('#DOPBSP-settings-users-permissions-filters-order').val(),
                                                          orderby: $('#DOPBSP-settings-users-permissions-filters-order-by').val(),
                                                          role: $('#DOPBSP-settings-users-permissions-filters-role').val(),
                                                          search: $('#DOPBSP-settings-users-permissions-filters-search').val()}, function(data){
                DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_LOADING_SUCCESS'));
                $('#DOPBSP-users-list').html(data);
            }).fail(function(data){
                DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
            });
        }, 600);
    };
    
    /*
     * Set users permissions.
     * 
     * @param id (Number): user ID (if 0 general permissions are set)
     * @param slug (String): permission slug
     * @param calednarId (Number): calendar ID
     */
    this.set = function(id,
                        slug,
                        calendarId){
        calendarId = calendarId === undefined ? 0:calendarId;
        
        DOPBSP.toggleMessages('active-info', DOPBSP.text('MESSAGES_SAVING'));
        
        $.post(ajaxurl, {action: 'dopbsp_settings_users_set',
                         id: id,
                         slug: slug,
                         value: $('#DOPBSP-settings-users-permissions-'+slug+(id !== 0 ? '-'+id:'')).is(':checked') ? 1:0,
                         calendar_id: calendarId}, function(data){
            DOPBSP.toggleMessages('success', DOPBSP.text('MESSAGES_SAVING_SUCCESS'));
        }).fail(function(data){
            DOPBSP.toggleMessages('error', data.status+': '+data.statusText);
        });
    };
    
    return this.__construct();
};