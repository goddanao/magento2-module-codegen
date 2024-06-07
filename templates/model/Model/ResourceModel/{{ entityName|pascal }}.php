{{ include(template_from_string(headerPHP)) }}
namespace {{ vendorName|pascal }}\{{ moduleName|pascal }}\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use {{ vendorName|pascal }}\{{ moduleName|pascal }}\Api\Data\{{ entityName|pascal }}Interface;

class {{ entityName|pascal }} extends AbstractDb
{
    // @phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
    protected function _construct(): void
    {
        $this->_init({{ entityName|pascal }}Interface::TABLE_NAME, {{ entityName|pascal }}Interface::ENTITY_ID);
    }
}
