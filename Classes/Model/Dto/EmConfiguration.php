<?php

namespace Localizationteam\L10nmgr\Model\Dto;

use Exception;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EmConfiguration
{
    /**
     * @var bool
     */
    protected $delete_translations = false;

    /**
     * @var bool
     */
    protected $enable_hidden_languages = false;

    // Enable settings
    /**
     * @var bool
     */
    protected $enable_notification = false;

    /**
     * @var bool
     */
    protected $enable_customername = false;

    /**
     * @var bool
     */
    protected $enable_ftp = false;

    /**
     * @var bool
     */
    protected $enable_stat_hook = false;

    /**
     * @var bool
     */
    protected $enable_neverHideAtCopy = true;

    /**
     * @var string
     */
    protected $disallowDoktypes = '255, ---div---';

    /**
     * @var bool
     */
    protected $import_dontProcessTransformations = true;

    /**
     * @var string
     */
    protected $l10nmgr_cfg = '';

    // Load L10N manager configration
    /**
     * @var string
     */
    protected $l10nmgr_tlangs = '';

    /**
     * @var string
     */
    protected $email_recipient = '';

    // Define email notification
    /**
     * @var string
     */
    protected $email_recipient_import = '';

    /**
     * @var string
     */
    protected $email_sender = '';

    /**
     * @var string
     */
    protected $email_sender_name = '';

    /**
     * @var string
     */
    protected $email_sender_organisation = '';

    /**
     * @var string
     */
    protected $email_attachment = false;

    /**
     * @var string
     */
    protected $ftp_server = '';

    // Define FTP server details
    /**
     * @var string
     */
    protected $ftp_server_path = '';

    /**
     * @var string
     */
    protected $ftp_server_downpath = '';

    /**
     * @var string
     */
    protected $ftp_server_username = '';

    /**
     * @var string
     */
    protected $ftp_server_password = '';

    /**
     * @var int
     */
    protected $service_children = 3;

    // Import service
    /**
     * @var string
     */
    protected $service_user = '';

    /**
     * @var string
     */
    protected $service_pwd = '';

    /**
     * @var string
     */
    protected $service_enc = '';

    public function __construct(array $configuration = [])
    {
        if (empty($configuration)) {
            try {
                $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
                $configuration = $extensionConfiguration->get('l10nmgr');
            } catch (Exception $exception) {
                // do nothing
            }
        }

        foreach ($configuration as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function isDeleteTranslations(): bool
    {
        return $this->delete_translations;
    }

    public function isEnableHiddenLanguages(): bool
    {
        return $this->enable_hidden_languages;
    }

    public function isEnableNotification(): bool
    {
        return $this->enable_notification;
    }

    public function isEnableCustomername(): bool
    {
        return $this->enable_customername;
    }

    public function isEnableFtp(): bool
    {
        return $this->enable_ftp;
    }

    public function isEnableStatHook(): bool
    {
        return $this->enable_stat_hook;
    }

    public function isEnableNeverHideAtCopy(): bool
    {
        return $this->enable_neverHideAtCopy;
    }

    public function getDisallowDoktypes(): string
    {
        return $this->disallowDoktypes;
    }

    public function isImportDontProcessTransformations(): bool
    {
        return $this->import_dontProcessTransformations;
    }

    public function getL10NmgrCfg(): string
    {
        return $this->l10nmgr_cfg;
    }

    public function getL10NmgrTlangs(): string
    {
        return $this->l10nmgr_tlangs;
    }

    public function getEmailRecipient(): string
    {
        return $this->email_recipient;
    }

    public function getEmailRecipientImport(): string
    {
        return $this->email_recipient_import;
    }

    public function getEmailSender(): string
    {
        return $this->email_sender;
    }

    public function getEmailSenderName(): string
    {
        return $this->email_sender_name;
    }

    public function getEmailSenderOrganisation(): string
    {
        return $this->email_sender_organisation;
    }

    public function isEmailAttachment(): bool
    {
        return $this->email_attachment;
    }

    public function getFtpServerPath(): string
    {
        return $this->ftp_server_path;
    }

    public function getFtpServerDownPath(): string
    {
        return $this->ftp_server_downpath;
    }

    public function getServiceChildren(): int
    {
        return $this->service_children;
    }

    public function getServiceUser(): string
    {
        return $this->service_user;
    }

    public function getServicePwd(): string
    {
        return $this->service_pwd;
    }

    public function getServiceEnc(): string
    {
        return $this->service_enc;
    }

    public function hasFtpCredentials(): bool
    {
        return
            !empty($this->getFtpServer())
            && !empty($this->getFtpServerUsername())
            && !empty($this->getFtpServerPassword());
    }

    public function getFtpServer(): string
    {
        return $this->ftp_server;
    }

    public function getFtpServerUsername(): string
    {
        return $this->ftp_server_username;
    }

    public function getFtpServerPassword(): string
    {
        return $this->ftp_server_password;
    }
}
